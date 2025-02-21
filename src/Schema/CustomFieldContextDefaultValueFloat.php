<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueFloatDoc
final readonly class CustomFieldContextDefaultValueFloat extends Dto
{
    public function __construct(
        /** The default floating-point number. */
        public float $number,

        public string $type,
    ) {
    }
}
