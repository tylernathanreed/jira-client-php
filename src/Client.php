<?php

namespace Jira\Client;

use Jira\Client\Contracts\Factory as FactoryContract;

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
     * @param class-string<TDto>|true $schema
     * @param Dto|array<string,mixed> $body
     * @param array<string,mixed> $header
     * @param array<string,mixed> $query
     * @param array<string,int|string|null> $path
     *
     * @return ($schema is true ? true : (TDto is PolymorphicDto ? Dto : TDto))
     */
    public function call(
        string $uri,
        string $method,
        int $success,
        string|true $schema,
        Dto|array $body = [],
        array $header = [],
        array $query = [],
        array $path = [],
    ): Dto|true {
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
