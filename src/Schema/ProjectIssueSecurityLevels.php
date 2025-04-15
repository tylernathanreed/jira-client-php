<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of issue level security items in a project. */
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
