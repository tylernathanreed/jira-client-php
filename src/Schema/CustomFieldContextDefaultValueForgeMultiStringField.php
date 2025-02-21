<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default text for a Forge collection of strings custom field. */
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
