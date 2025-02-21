<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The project and issue type mapping with a matching custom field context. */
final readonly class ContextForProjectAndIssueType extends Dto
{
    public function __construct(
        /** The ID of the custom field context. */
        public string $contextId,

        /** The ID of the issue type. */
        public string $issueTypeId,

        /** The ID of the project. */
        public string $projectId,
    ) {
    }
}
