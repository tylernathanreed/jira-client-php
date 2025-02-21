<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueReadOnlyDoc
final readonly class CustomFieldContextDefaultValueReadOnly extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The default text.
         * The maximum length is 255 characters.
         */
        public ?string $text = null,
    ) {
    }
}
