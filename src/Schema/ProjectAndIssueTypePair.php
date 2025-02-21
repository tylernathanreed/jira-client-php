<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectAndIssueTypePairDoc
final readonly class ProjectAndIssueTypePair extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public string $issueTypeId,

        /** The ID of the project. */
        public string $projectId,
    ) {
    }
}
