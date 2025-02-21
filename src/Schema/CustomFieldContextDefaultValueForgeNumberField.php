<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeNumberFieldDoc
final readonly class CustomFieldContextDefaultValueForgeNumberField extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** The default floating-point number. */
        public float $number,

        public string $type,
    ) {
    }
}
