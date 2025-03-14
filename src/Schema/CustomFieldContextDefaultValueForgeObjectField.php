<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a Forge object custom field. */
final readonly class CustomFieldContextDefaultValueForgeObjectField extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The default JSON object.
         * 
         * @var array<string,mixed>
         */
        public ?array $object = null,
    ) {
    }
}
