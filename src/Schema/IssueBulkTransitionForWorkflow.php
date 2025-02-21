<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueBulkTransitionForWorkflowDoc
final readonly class IssueBulkTransitionForWorkflow extends Dto
{
    public function __construct(
        /** Indicates whether all the transitions of this workflow are available in the transitions list or not. */
        public ?bool $isTransitionsFiltered = null,

        /**
         * List of issue keys from the request which are associated with this workflow.
         * 
         * @var ?list<string>
         */
        public ?array $issues = null,

        /**
         * List of transitions available for issues from the request which are associated with this workflow
         * 
         *  **This list includes only those transitions that are common across the issues in this workflow and do not involve any additional field updates.** 
         * 
         * @var ?list<SimplifiedIssueTransition>
         */
        public ?array $transitions = null,
    ) {
    }
}
