<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldDetailsDoc
final readonly class FieldDetails extends Dto
{
    public function __construct(
        /**
         * The names that can be used to reference the field in an advanced search.
         * For more information, see "Advanced searching - fields reference".
         * 
         * @link https://confluence.atlassian.com/x/gwORLQ
         * 
         * @var ?list<string>
         */
        public ?array $clauseNames = null,

        /** Whether the field is a custom field. */
        public ?bool $custom = null,

        /** The ID of the field. */
        public ?string $id = null,

        /** The key of the field. */
        public ?string $key = null,

        /** The name of the field. */
        public ?string $name = null,

        /** Whether the field can be used as a column on the issue navigator. */
        public ?bool $navigable = null,

        /** Whether the content of the field can be used to order lists. */
        public ?bool $orderable = null,

        /** The data schema for the field. */
        public ?JsonTypeBean $schema = null,

        /** The scope of the field. */
        public ?Scope $scope = null,

        /** Whether the content of the field can be searched. */
        public ?bool $searchable = null,
    ) {
    }
}
