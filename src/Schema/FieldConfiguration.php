<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldConfigurationDoc
final readonly class FieldConfiguration extends Dto
{
    public function __construct(
        /** The description of the field configuration. */
        public string $description,

        /** The ID of the field configuration. */
        public int $id,

        /** The name of the field configuration. */
        public string $name,

        /** Whether the field configuration is the default. */
        public ?bool $isDefault = null,
    ) {
    }
}
