<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIssueTypesDoc
final readonly class ProjectIssueTypes extends Dto
{
    public function __construct(
        /**
         * IDs of the issue types
         * 
         * @var ?list<string>
         */
        public ?array $issueTypes = null,

        public ?ProjectId $project = null,
    ) {
    }
}
