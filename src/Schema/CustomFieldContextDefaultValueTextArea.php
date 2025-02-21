<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueTextAreaDoc
final readonly class CustomFieldContextDefaultValueTextArea extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The default text.
         * The maximum length is 32767 characters.
         */
        public ?string $text = null,
    ) {
    }
}
