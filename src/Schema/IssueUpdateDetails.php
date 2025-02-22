<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue update request. */
final readonly class IssueUpdateDetails extends Dto
{
    public function __construct(
        /**
         * List of issue screen fields to update, specifying the sub-field to update and its value for each field.
         * This field provides a straightforward option when setting a sub-field.
         * When multiple sub-fields or other operations are required, use `update`.
         * Fields included in here cannot be included in `update`.
         */
        public ?object $fields = null,

        /** Additional issue history details. */
        public ?HistoryMetadata $historyMetadata = null,

        /**
         * Details of issue properties to be add or update.
         * 
         * @var ?list<EntityProperty>
         */
        public ?array $properties = null,

        /**
         * Details of a transition.
         * Required when performing a transition, optional when creating or editing an issue.
         */
        public ?IssueTransition $transition = null,

        /**
         * A Map containing the field field name and a list of operations to perform on the issue screen field.
         * Note that fields included in here cannot be included in `fields`.
         * 
         * @var array<string,FieldUpdateOperation>
         */
        public ?array $update = null,
    ) {
    }
}
