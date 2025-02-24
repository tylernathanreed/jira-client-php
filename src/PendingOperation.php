<?php

namespace Jira\Client;

class PendingOperation
{
    public function __construct(
        public string $uri,

        /** @var 'get'|'post'|'put'|'patch'|'delete' */
        public string $method,

        /** @var Dto|array<string,mixed> */
        public Dto|array $body = [],

        /** @var array<string,mixed> */
        public array $header = [],

        /** @var array<string,mixed> */
        public array $query = [],

        /** @var array<string,mixed> */
        public array $path = [],
    ) {}
}
