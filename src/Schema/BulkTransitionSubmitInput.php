<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class BulkTransitionSubmitInput extends Dto
{
    public function __construct(
        /**
         * List of all the issue IDs or keys that are to be bulk transitioned.
         * 
         * @var list<string>
         */
        public array $selectedIssueIdsOrKeys,

        /** The ID of the transition that is to be performed on the issues. */
        public string $transitionId,
    ) {
    }
}
