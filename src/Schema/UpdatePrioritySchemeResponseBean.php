<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdatePrioritySchemeResponseBeanDoc
final readonly class UpdatePrioritySchemeResponseBean extends Dto
{
    public function __construct(
        public ?PrioritySchemeWithPaginatedPrioritiesAndProjects $priorityScheme = null,

        /** The in-progress issue migration task. */
        public ?TaskProgressBeanJsonNode $task = null,
    ) {
    }
}
