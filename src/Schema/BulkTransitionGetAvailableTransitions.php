<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkTransitionGetAvailableTransitionsDoc
final readonly class BulkTransitionGetAvailableTransitions extends Dto
{
    public function __construct(
        /**
         * List of available transitions for bulk transition operation for requested issues grouped by workflow
         * 
         * @var ?list<IssueBulkTransitionForWorkflow>
         */
        public ?array $availableTransitions = null,

        /** The end cursor for use in pagination. */
        public ?string $endingBefore = null,

        /** The start cursor for use in pagination. */
        public ?string $startingAfter = null,
    ) {
    }
}
