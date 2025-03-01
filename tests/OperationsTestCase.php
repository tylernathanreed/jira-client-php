<?php

namespace Tests;

use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Illuminate\Http\Client\Factory as HttpFactory;
use Jira\Client\Client;
use Jira\Client\Configuration;
use Jira\Client\Contracts\Factory as FactoryContract;
use Jira\Client\Factory;
use Override;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

abstract class OperationsTestCase extends TestCase
{
    protected Configuration $config;
    protected Client $client;
    protected FactoryContract $factory;

    #[Override]
    protected function setUp(): void
    {
        $this->config = $this->newConfiguration();
        $this->factory = $this->newFactory();
        $this->client = $this->newClient();
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

            $this->assertEqualsIgnoringCase($call['method'], $request->getMethod());
            $this->assertEquals($url, (string) $request->getUri());
            $this->assertEquals($authorization, $request->getHeader('Authorization')[0]);
            $this->assertEquals($host, $request->getHeader('Host')[0]);
            $this->assertEquals($accept, $request->getHeader('Accept'));

            if (isset($call['body'])) {
                $this->assertEquals(
                    expected: $call['body']->toArray(),
                    actual: json_decode((string) $request->getBody(), true)
                );
            }

            return Create::promiseFor(new Psr7Response($status, body: $response));
        });
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

    protected function newHttpFactory(): HttpFactory
    {
        return new HttpFactory;
    }

    protected function newFactory(): FactoryContract
    {
        return new Factory();
    }
}
