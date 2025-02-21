<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldReferenceDataDoc
final readonly class FieldReferenceData extends Dto
{
    public function __construct(
        /**
         * Whether the field provide auto-complete suggestions.
         * 
         * @var 'true'|'false'|null
         */
        public ?string $auto = null,

        /** If the item is a custom field, the ID of the custom field. */
        public ?string $cfid = null,

        /**
         * Whether this field has been deprecated.
         * 
         * @var 'true'|'false'|null
         */
        public ?string $deprecated = null,

        /** The searcher key of the field, only passed when the field is deprecated. */
        public ?string $deprecatedSearcherKey = null,

        /**
         * The display name contains the following:
         * 
         *  - for system fields, the field name.
         * For example, `Summary`
         *  - for collapsed custom fields, the field name followed by a hyphen and then the field name and field type.
         * For example, `Component - Component[Dropdown]`
         *  - for other custom fields, the field name followed by a hyphen and then the custom field ID.
         * For example, `Component - cf[10061]`.
         */
        public ?string $displayName = null,

        /**
         * The valid search operators for the field.
         * 
         * @var ?list<string>
         */
        public ?array $operators = null,

        /**
         * Whether the field can be used in a query's `ORDER BY` clause.
         * 
         * @var 'true'|'false'|null
         */
        public ?string $orderable = null,

        /**
         * Whether the content of this field can be searched.
         * 
         * @var 'true'|'false'|null
         */
        public ?string $searchable = null,

        /**
         * The data types of items in the field.
         * 
         * @var ?list<string>
         */
        public ?array $types = null,

        /** The field identifier. */
        public ?string $value = null,
    ) {
    }
}
