<?php

namespace Tests;

use Generator;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;
use Jira\Client\Client;
use Jira\Client\Configuration;
use Jira\Client\Runner;
use Mockery;
use Mockery\MockInterface;
use Override;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

abstract class OperationsTestCase extends TestCase
{
    protected Configuration $config;
    protected Factory $http;
    protected Client $client;
    protected Runner $runner;

    #[Override]
    protected function setUp(): void
    {
        $this->config = $this->newConfiguration();
        $this->http = $this->newHttpFactory();
        $this->runner = $this->newRunner();
        $this->client = $this->newClient();

        $this->http->preventStrayRequests();
    }

    #[Override]
    protected function tearDown(): void
    {
        $this->addToAssertionCount(Mockery::getContainer()->mockery_getExpectationCount());

        Mockery::close();
    }

    protected function assertCall(string $method, array $call, array $arguments, ?string $response): void
    {
        $this->mockCall($call, $response, $call['success']);

        $this->client->{$method}(...$arguments);
    }

    protected function mockCall(array $call, ?string $response, int $status): void
    {
        $this->http->fake(function (Request $request) use ($call, $response, $status) {
            $host = 'testing.atlassian.net';
            $url = 'https://' . $host . $call['uri'];
            $authorization = 'Basic ' . base64_encode('testing:password');
            $accept = ['application/json'];

            $this->assertEqualsIgnoringCase($call['method'], $request->method());
            $this->assertEquals($url, $request->url());
            $this->assertEquals($authorization, $request->header('Authorization')[0]);
            $this->assertEquals($host, $request->header('Host')[0]);
            $this->assertEquals($accept, $request->header('Accept'));

            if (isset($call['body'])) {
                $this->assertEquals($call['body']->toArray(), $request->data());
            }

            return $this->http->response($response, $status);
        });
    }

    protected function newClient(): Client
    {
        return new Client(
            configuration: $this->config,
            runner: $this->runner,
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

    protected function newHttpFactory(): Factory
    {
        return new Factory;
    }

    protected function newRunner(): Runner
    {
        return new Runner($this->http);
    }

    protected function newResponse(?string $body, int $status = 200): Response
    {
        $baseResponse = new Psr7Response(body: $body, status: $status, headers: [
            'Content-Type' => 'application/json',
        ]);

        return new Response($baseResponse);
    }
}
