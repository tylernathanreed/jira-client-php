<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The schema of a field. */
final readonly class JsonTypeBean extends Dto
{
    public function __construct(
        /** The data type of the field. */
        public string $type,

        /**
         * If the field is a custom field, the configuration of the field.
         * 
         * @var array<string,mixed>
         */
        public ?array $configuration = null,

        /** If the field is a custom field, the URI of the field. */
        public ?string $custom = null,

        /** If the field is a custom field, the custom ID of the field. */
        public ?int $customId = null,

        /** When the data type is an array, the name of the field items within the array. */
        public ?string $items = null,

        /** If the field is a system field, the name of the field. */
        public ?string $system = null,
    ) {
    }
}
