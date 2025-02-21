<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IssueBulkEditField extends Dto
{
    public function __construct(
        /** Description of the field. */
        public ?string $description = null,

        /**
         * A list of options related to the field, applicable in contexts where multiple selections are allowed.
         * 
         * @var ?list<IssueBulkOperationsFieldOption>
         */
        public ?array $fieldOptions = null,

        /** The unique ID of the field. */
        public ?string $id = null,

        /** Indicates whether the field is mandatory for the operation. */
        public ?bool $isRequired = null,

        /**
         * Specifies supported actions (like add, replace, remove) on multi-select fields via an enum.
         * 
         * @var ?list<string>
         */
        public ?array $multiSelectFieldOptions = null,

        /** The display name of the field. */
        public ?string $name = null,

        /** A URL to fetch additional data for the field */
        public ?string $searchUrl = null,

        /** The type of the field. */
        public ?string $type = null,

        /** A message indicating why the field is unavailable for editing. */
        public ?string $unavailableMessage = null,
    ) {
    }
}
