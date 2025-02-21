<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Associated issue type screen scheme and project. */
final readonly class IssueTypeScreenSchemeProjectAssociation extends Dto
{
    public function __construct(
        /** The ID of the issue type screen scheme. */
        public ?string $issueTypeScreenSchemeId = null,

        /** The ID of the project. */
        public ?string $projectId = null,
    ) {
    }
}
