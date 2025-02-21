<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdatePrioritiesInSchemeRequestBeanDoc
final readonly class UpdatePrioritiesInSchemeRequestBean extends Dto
{
    public function __construct(
        /** Priorities to add to a scheme */
        public ?PrioritySchemeChangesWithoutMappings $add = null,

        /** Priorities to remove from a scheme */
        public ?PrioritySchemeChangesWithoutMappings $remove = null,
    ) {
    }
}
