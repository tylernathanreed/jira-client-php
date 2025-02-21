<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a custom field context. */
final readonly class CustomFieldContextUpdateDetails extends Dto
{
    public function __construct(
        /**
         * The description of the custom field context.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,

        /**
         * The name of the custom field context.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,
    ) {
    }
}
