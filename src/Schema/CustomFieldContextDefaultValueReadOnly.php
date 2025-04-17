<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The default text for a read only custom field. */
final class CustomFieldContextDefaultValueReadOnly extends Dto
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
