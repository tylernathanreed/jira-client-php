<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateProjectsInSchemeRequestBeanDoc
final readonly class UpdateProjectsInSchemeRequestBean extends Dto
{
    public function __construct(
        /** Projects to add to a scheme */
        public ?PrioritySchemeChangesWithoutMappings $add = null,

        /** Projects to remove from a scheme */
        public ?PrioritySchemeChangesWithoutMappings $remove = null,
    ) {
    }
}
