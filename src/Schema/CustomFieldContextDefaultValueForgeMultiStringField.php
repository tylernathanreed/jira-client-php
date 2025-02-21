<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeMultiStringFieldDoc
final readonly class CustomFieldContextDefaultValueForgeMultiStringField extends Dto
{
    public function __construct(
        public string $type,

        /**
         * List of string values.
         * The maximum length for a value is 254 characters.
         * 
         * @var ?list<string>
         */
        public ?array $values = null,
    ) {
    }
}
