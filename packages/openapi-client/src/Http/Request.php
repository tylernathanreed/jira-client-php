<?php

namespace Reedware\OpenApi\Client\Http;

readonly class Request
{
    public function __construct(
        /** @var 'get'|'post'|'put'|'patch'|'delete' */
        public string $method,

        /** @var non-empty-string */
        public string $uri,

        /** @var array<string,array<string>|string> */
        public array $headers = [],

        /** @var non-empty-string|null */
        public ?string $body = null,
    ) {
    }
}
