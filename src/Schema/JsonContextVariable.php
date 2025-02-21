<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JsonContextVariableDoc
final readonly class JsonContextVariable extends Dto
{
    public function __construct(
        /** Type of custom context variable. */
        public string $type,

        /** A JSON object containing custom content. */
        public ?object $value = null,
    ) {
    }
}
