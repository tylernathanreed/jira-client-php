<?php

namespace Reedware\OpenApi\Client\Http;

readonly class Request
{
    public function __construct(
        /** @var 'get'|'post'|'put'|'patch'|'delete' */
        public string $method,

        public string $uri,

        /** @var array<string,mixed> */
        public array $headers = [],

        public ?string $body = null,
    ) {
    }
}
