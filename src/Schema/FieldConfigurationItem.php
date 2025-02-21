<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A field within a field configuration. */
final readonly class FieldConfigurationItem extends Dto
{
    public function __construct(
        /** The ID of the field within the field configuration. */
        public string $id,

        /** The description of the field within the field configuration. */
        public ?string $description = null,

        /** Whether the field is hidden in the field configuration. */
        public ?bool $isHidden = null,

        /** Whether the field is required in the field configuration. */
        public ?bool $isRequired = null,

        /** The renderer type for the field within the field configuration. */
        public ?string $renderer = null,
    ) {
    }
}
