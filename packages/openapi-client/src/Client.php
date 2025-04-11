<?php

namespace Reedware\OpenApi\Client;

use Reedware\OpenApi\Client\Http\Contracts\Factory as FactoryContract;
use Reedware\OpenApi\Client\Http\Deserializer;
use Reedware\OpenApi\Client\Http\Dto;
use Reedware\OpenApi\Client\Http\Factory;
use Reedware\OpenApi\Client\Http\PendingOperation;
use Reedware\OpenApi\Client\Http\PolymorphicDto;
use Reedware\OpenApi\Client\Http\Processor;

class Client
{
    use PerformsOperations;

    public readonly Configuration $configuration;
    public readonly FactoryContract $factory;
    public readonly Processor $processor;

    public function __construct(Configuration $configuration, ?FactoryContract $factory = null, ?Processor $processor = null)
    {
        $this->configuration = $configuration;
        $this->factory = $factory ?: new Factory();
        $this->processor = $processor ?: new Processor(new Deserializer());
    }
    /**
     * @phpstan-template TDto of Dto
     * 
     * @param 'get'|'post'|'put'|'patch'|'delete' $method
     * @param array{0:class-string<TDto>}|class-string<TDto>|true $schema
     * @param Dto|array<string,mixed> $body
     * @param array<string,mixed> $header
     * @param array<string,mixed> $query
     * @param array<string,int|string|null> $path
     *
     * @return (
     *     $schema is array ? (TDto is PolymorphicDto ? list<Dto> : list<TDto>) : (
     *     $schema is string ? (TDto is PolymorphicDto ? Dto : TDto) : (
     *     true
     * )))
     */
    public function call(
        string $uri,
        string $method,
        int $success,
        array|string|true $schema,
        Dto|array $body = [],
        array $header = [],
        array $query = [],
        array $path = [],
    ): array|Dto|true {
        $operation = new PendingOperation(
            uri: $uri,
            method: $method,
            body: $body,
            header: $header,
            query: $query,
            path: $path,
        );

        $response = $this->factory->make($operation, $this->configuration);

        return $this->processor->process($operation, $response, $success, $schema);
    }
}
