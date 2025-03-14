<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The project and issue type mapping. */
final readonly class ProjectIssueTypeMapping extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public string $issueTypeId,

        /** The ID of the project. */
        public string $projectId,
    ) {
    }
}
