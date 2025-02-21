<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the options for a select list issue field. */
final readonly class IssueFieldOption extends Dto
{
    public function __construct(
        /**
         * The unique identifier for the option.
         * This is only unique within the select field's set of options.
         */
        public int $id,

        /** The option's name, which is displayed in Jira. */
        public string $value,

        public ?IssueFieldOptionConfiguration $config = null,

        /**
         * The properties of the object, as arbitrary key-value pairs.
         * These properties can be searched using JQL, if the extractions (see "Issue Field Option Property Index") are defined in the descriptor for the issue field module.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/
         */
        public ?object $properties = null,
    ) {
    }
}
