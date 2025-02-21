<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of the field configuration scheme. */
final readonly class UpdateFieldConfigurationSchemeDetails extends Dto
{
    public function __construct(
        /**
         * The name of the field configuration scheme.
         * The name must be unique.
         */
        public string $name,

        /** The description of the field configuration scheme. */
        public ?string $description = null,
    ) {
    }
}
