<?php

namespace Tests;

use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Jira\Client\Client;
use Jira\Client\Configuration;
use Jira\Client\Contracts\Factory as FactoryContract;
use Jira\Client\Deserializer;
use Jira\Client\Dto;
use Jira\Client\Factory;
use Override;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

abstract class OperationsTestCase extends TestCase
{
    protected Configuration $config;
    protected Client $client;
    protected FactoryContract $factory;
    protected Deserializer $deserializer;

    #[Override]
    protected function setUp(): void
    {
        $this->config = $this->newConfiguration();
        $this->factory = $this->newFactory();
        $this->client = $this->newClient();
        $this->deserializer = $this->newDeserializer();
    }

    protected function assertCall(string $method, array $call, array $arguments, ?string $response): void
    {
        $this->mockCall($call, $response, $call['success']);

        $this->client->{$method}(...$arguments);
    }

    protected function mockCall(array $call, ?string $response, int $status): void
    {
        $this->factory->fake(function (RequestInterface $request) use ($call, $response, $status) {
            $host = 'testing.atlassian.net';
            $url = 'https://' . $host . $call['uri'];
            $authorization = 'Basic ' . base64_encode('testing:password');
            $accept = ['application/json'];

            foreach ((array) ($call['path'] ?? []) as $key => $value) {
                $url = str_replace("{{$key}}", $value, $url);
            }

            if (isset($call['query'])) {
                $query = array_filter($call['query'], fn ($v) => ! is_null($v));

                if (! empty($query)) {
                    $url .= '?' . http_build_query($query);
                }
            }

            $this->assertEqualsIgnoringCase($call['method'], $request->getMethod());
            $this->assertEquals($url, (string) $request->getUri());
            $this->assertEquals($authorization, $request->getHeader('Authorization')[0]);
            $this->assertEquals($host, $request->getHeader('Host')[0]);
            $this->assertEquals($accept, $request->getHeader('Accept'));

            if (isset($call['body'])) {
                $this->assertEqualsCanonicalizing(
                    expected: $call['body']->toArray(),
                    actual: json_decode((string) $request->getBody(), true)
                );
            }

            return Create::promiseFor(new Psr7Response($status, body: $response));
        });
    }

    /**
     * @phpstan-template TDto of Dto
     * @param class-string<TDto> $class
     * @param ($array is true ? list<array<string,mixed>> : array<string,mixed>) $data
     * @return ($array is true ? (TDto is PolymorphicDto ? list<Dto> : list<TDto>) : (TDto is PolymorphicDto ? Dto : TDto))
     */
    protected function deserialize(string $class, array $data, bool $array = false)
    {
        return $this->deserializer->deserialize($data, $class, $array);
    }

    protected function newClient(): Client
    {
        return new Client(
            configuration: $this->config,
            factory: $this->factory,
            processor: null,
        );
    }

    protected function newConfiguration(): Configuration
    {
        return new Configuration(
            host: 'https://testing.atlassian.net',
            username: 'testing',
            password: 'password'
        );
    }

    protected function newFactory(): FactoryContract
    {
        return new Factory();
    }

    protected function newDeserializer(): Deserializer
    {
        return new Deserializer();
    }
}
