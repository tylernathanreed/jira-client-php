<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeSchemeProjectAssociationDoc
final readonly class IssueTypeSchemeProjectAssociation extends Dto
{
    public function __construct(
        /** The ID of the issue type scheme. */
        public string $issueTypeSchemeId,

        /** The ID of the project. */
        public string $projectId,
    ) {
    }
}
