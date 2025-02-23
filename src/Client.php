<?php

namespace Jira\Client;

class Client
{
    use PerformsOperations;

    /**
     * @phpstan-template TSchema of Dto
     * 
     * @param class-string<TSchema>|true $schema
     * @param Dto|array<string,mixed>|null $body
     * @param array<string,mixed> $query
     * @param array<string,int|string|null> $path
     *
     * @return ($schema is true ? true : TSchema)
     */
    public function call(
        string $uri,
        string $method,
        int $success,
        string|true $schema,
        Dto|array|null $body = null,
        array $query = [],
        array $path = [],
    ) {

    }
}
