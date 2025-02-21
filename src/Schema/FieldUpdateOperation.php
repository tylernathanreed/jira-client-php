<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldUpdateOperationDoc
final readonly class FieldUpdateOperation extends Dto
{
    public function __construct(
        /**
         * The value to add to the field.
         * 
         * @example 'triaged'
         */
        public mixed $add = null,

        /**
         * The field value to copy from another issue.
         * 
         * @example ['issuelinks' => ['sourceIssues' => [0 => ['key' => 'FP-5']]]]
         */
        public mixed $copy = null,

        /**
         * The value to edit in the field.
         * 
         * @example ['originalEstimate' => '1w 1d', 'remainingEstimate' => '4d']
         */
        public mixed $edit = null,

        /**
         * The value to removed from the field.
         * 
         * @example 'blocker'
         */
        public mixed $remove = null,

        /**
         * The value to set in the field.
         * 
         * @example 'A new summary'
         */
        public mixed $set = null,
    ) {
    }
}
