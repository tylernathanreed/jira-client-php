<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeObjectFieldDoc
final readonly class CustomFieldContextDefaultValueForgeObjectField extends Dto
{
    public function __construct(
        public string $type,

        /** The default JSON object. */
        public ?object $object = null,
    ) {
    }
}
