<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldConfigurationDetailsDoc
final readonly class FieldConfigurationDetails extends Dto
{
    public function __construct(
        /**
         * The name of the field configuration.
         * Must be unique.
         */
        public string $name,

        /** The description of the field configuration. */
        public ?string $description = null,
    ) {
    }
}
