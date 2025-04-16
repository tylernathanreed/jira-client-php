<?php

namespace Reedware\OpenApi\Client\Http;

readonly class Response
{
    public function __construct(
        public int $status,
        public ?string $body = null,
    ) {
    }
}
