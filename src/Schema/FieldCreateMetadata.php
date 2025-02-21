<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldCreateMetadataDoc
final readonly class FieldCreateMetadata extends Dto
{
    public function __construct(
        /** The field id. */
        public string $fieldId,

        /** The key of the field. */
        public string $key,

        /** The name of the field. */
        public string $name,

        /**
         * The list of operations that can be performed on the field.
         * 
         * @var list<string>
         */
        public array $operations,

        /** Whether the field is required. */
        public bool $required,

        /** The data type of the field. */
        public JsonTypeBean $schema,

        /**
         * The list of values allowed in the field.
         * 
         * @var ?list<>
         */
        public ?array $allowedValues = null,

        /** The URL that can be used to automatically complete the field. */
        public ?string $autoCompleteUrl = null,

        /** The configuration properties. */
        public ?object $configuration = null,

        /** The default value of the field. */
        public mixed $defaultValue = null,

        /** Whether the field has a default value. */
        public ?bool $hasDefaultValue = null,
    ) {
    }
}
