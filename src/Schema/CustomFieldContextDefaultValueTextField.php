<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueTextFieldDoc
final readonly class CustomFieldContextDefaultValueTextField extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The default text.
         * The maximum length is 254 characters.
         */
        public ?string $text = null,
    ) {
    }
}
