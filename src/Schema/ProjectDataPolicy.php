<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectDataPolicyDoc
final readonly class ProjectDataPolicy extends Dto
{
    public function __construct(
        /** Whether the project contains any content inaccessible to the requesting application. */
        public ?bool $anyContentBlocked = null,
    ) {
    }
}
