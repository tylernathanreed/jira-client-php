<?php

namespace Tests;

use Jira\Client\Client;
use Jira\Client\Configuration;
use Jira\Client\Http\Contracts\Transporter;
use Jira\Client\Http\Deserializer;
use Jira\Client\Http\Dto;
use Jira\Client\Http\Request;
use Jira\Client\Http\Response;
use Jira\Client\Http\TransporterFactory;
use Override;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;

abstract class OperationsTestCase extends TestCase
{
    protected Configuration $config;
    protected Client $client;
    protected Transporter $transporter;
    protected Deserializer $deserializer;

    #[Override]
    protected function setUp(): void
    {
        $this->config = $this->newConfiguration();
        $this->transporter = $this->newTransporter();
        $this->client = $this->newClient();
        $this->deserializer = $this->newDeserializer();
    }

    protected function assertCall(string $method, array $call, array $arguments, ?string $response): void
    {
        $this->mockCall($call, $response, $call['success']);

        $result = $this->client->{$method}(...$arguments);

        if ($result instanceof Dto) {
            $this->assertValidSchema($result);
        }
    }

    protected function mockCall(array $call, ?string $response, int $status): void
    {
        $this->client->fake(function (Request $request) use ($call, $response, $status) {
            $host = 'https://testing.atlassian.net';
            $url = $host . $call['uri'];
            $authorization = 'Basic ' . base64_encode('testing:password');
            $accept = 'application/json';

            foreach ((array) ($call['path'] ?? []) as $key => $value) {
                $url = str_replace("{{$key}}", $value, $url);
            }

            if (isset($call['query'])) {
                $query = array_filter($call['query'], fn ($v) => ! is_null($v));

                if (! empty($query)) {
                    $url .= '?' . http_build_query($query, encoding_type: PHP_QUERY_RFC3986);
                }
            }

            $this->assertEqualsIgnoringCase($call['method'], $request->method);
            $this->assertEquals($url, rtrim($request->uri, '?'));
            $this->assertEquals($authorization, $request->headers['Authorization']);
            $this->assertEquals($host, $request->headers['Host']);
            $this->assertEquals($accept, $request->headers['Accept']);

            if (isset($call['body'])) {
                $this->assertEqualsCanonicalizing(
                    expected: $call['body']->toArray(),
                    actual: json_decode((string) $request->body, true)
                );
            }

            return new Response($status, $response);
        });
    }

    protected function assertValidSchema(Dto $schema): void
    {
        $properties = (new ReflectionClass($schema))->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if (! ($type = $property->getType()) || ! $type instanceof ReflectionNamedType) {
                continue;
            }

            if ($type->getName() !== 'array') {
                continue;
            }

            $value = $property->getValue($schema);

            if (is_null($value)) {
                continue;
            }

            if (preg_match('/@var ?\?list<([^>]+)>/', $property->getDocComment(), $matches)) {
                $iterableType = 'Jira\Client\Schema\\' . $matches[1];

                if (! class_exists($iterableType)) {
                    continue;
                }

                $this->assertIsArray($value);

                foreach ($value as $item) {
                    $this->assertInstanceOf($iterableType, $item, sprintf(
                        'Property [%s] expects list<%s>, found list<%s>.',
                        $property->getName(),
                        $iterableType,
                        gettype($item),
                    ));

                    if ($item instanceof Dto) {
                        $this->assertValidSchema($item);
                    }
                }
            }
        }
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
            transporter: $this->transporter,
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

    protected function newTransporter(): Transporter
    {
        return TransporterFactory::make();
    }

    protected function newDeserializer(): Deserializer
    {
        return new Deserializer();
    }
}
