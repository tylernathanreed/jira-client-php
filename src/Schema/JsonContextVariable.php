<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A JSON object with custom content. */
final readonly class JsonContextVariable extends Dto
{
    public function __construct(
        /** Type of custom context variable. */
        public string $type,

        /**
         * A JSON object containing custom content.
         * 
         * @var array<string,mixed>
         */
        public ?array $value = null,
    ) {
    }
}
