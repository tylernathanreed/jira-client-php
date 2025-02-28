<?php

namespace Jira\Client;

use Closure;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\UriTemplate\UriTemplate;
use Jira\Client\Contracts\Factory as FactoryContract;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * @phpstan-type TOptions array{
 *    auth?: array{0:string,1:string},
 *    connect_timeout: int,
 *    crypto_method: int,
 *    debug: bool|resource,
 *    headers: array{
 *       Authorization?:string,
 *       'User-Agent'?:string,
 *    },
 *    http_errors: false,
 *    json?: array<int|string,mixed>,
 *    query?: array<string,mixed>,
 *    timeout: int,
 * }
 */
class Factory implements FactoryContract
{
    protected Guzzle $client;

    /** @var list<Closure(RequestInterface,array<string,mixed>):?PromiseInterface> */
    protected array $stubCallbacks = [];

    public function make(PendingOperation $operation, Configuration $config): ResponseInterface
    {
        return $this->newResponse($operation, $config);
    }

    /** @param Closure(RequestInterface,array<string,mixed>):?PromiseInterface $callback */
    public function fake(Closure $callback): static
    {
        $this->stubCallbacks[] = $callback;

        return $this;
    }

    protected function newResponse(PendingOperation $operation, Configuration $config): ResponseInterface
    {
        return $this->newClient()->request(
            method: $operation->method,
            uri: $this->getUrl($operation, $config),
            options: $this->getOptions($operation, $config),
        );
    }

    protected function getUrl(PendingOperation $operation, Configuration $config): string
    {
        $url = ltrim(rtrim($config->host, '/') . '/' . ltrim($operation->uri, '/'), '/');

        return UriTemplate::expand($url, $operation->path);
    }

    /** @return TOptions */
    protected function getOptions(PendingOperation $operation, Configuration $config): array
    {
        $options = [
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::CRYPTO_METHOD => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
            RequestOptions::DEBUG => $config->debug,
            RequestOptions::HEADERS => [
                'Accept' => 'application/json',
            ],
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::TIMEOUT => 30,
        ];

        if (! empty($config->accessToken)) {
            $options[RequestOptions::HEADERS]['Authorization'] = trim('Bearer ' . $config->accessToken);
        } elseif (! empty($config->username) && ! empty($config->password)) {
            $options[RequestOptions::AUTH] = [$config->username, $config->password];
        }

        if (! empty($config->userAgent)) {
            $options[RequestOptions::HEADERS]['User-Agent'] = trim($config->userAgent);
        }

        if (! empty($operation->query)) {
            $options[RequestOptions::QUERY] = $operation->query;
        }

        if (! empty($operation->body)) {
            $options[RequestOptions::JSON] = $operation->body instanceof Dto
                ? $operation->body->toArray()
                : $operation->body;
        }

        return $options;
    }

    protected function newClient(): Guzzle
    {
        return new Guzzle([
            'handler' => $this->buildHandlerStack(),
        ]);
    }

    protected function buildHandlerStack(): HandlerStack
    {
        $handler = HandlerStack::create();

        $handler->push($this->buildStubHandler());

        return $handler;
    }

    protected function buildStubHandler(): Closure
    {
        return function (Closure $handler): Closure {
            /** @var Closure(RequestInterface, array<string,mixed>):?PromiseInterface $handler */

            return function (RequestInterface $request, array $options) use ($handler): ?PromiseInterface {
                /** @var array<string,mixed> $options */

                if (empty($this->stubCallbacks)) {
                    return $handler($request, $options);
                }

                foreach ($this->stubCallbacks as $callback) {
                    if (! is_null($response = $callback($request, $options))) {
                        return $response;
                    }
                }

                throw new RuntimeException(sprintf(
                    'Attempted request to [%s] without a matching fake.',
                    (string) $request->getUri()
                ));
            };
        };
    }
}
