<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A project and issueType ID pair that identifies a status mapping. */
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
