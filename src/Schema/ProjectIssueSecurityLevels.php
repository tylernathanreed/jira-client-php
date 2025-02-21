<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIssueSecurityLevelsDoc
final readonly class ProjectIssueSecurityLevels extends Dto
{
    public function __construct(
        /**
         * Issue level security items list.
         * 
         * @var list<SecurityLevel>
         */
        public array $levels,
    ) {
    }
}
