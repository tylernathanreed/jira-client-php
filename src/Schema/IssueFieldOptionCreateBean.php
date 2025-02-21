<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IssueFieldOptionCreateBean extends Dto
{
    public function __construct(
        /** The option's name, which is displayed in Jira. */
        public string $value,

        public ?IssueFieldOptionConfiguration $config = null,

        /**
         * The properties of the option as arbitrary key-value pairs.
         * These properties can be searched using JQL, if the extractions (see https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/) are defined in the descriptor for the issue field module.
         */
        public ?object $properties = null,
    ) {
    }
}
