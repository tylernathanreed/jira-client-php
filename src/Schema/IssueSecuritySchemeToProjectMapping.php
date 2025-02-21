<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueSecuritySchemeToProjectMappingDoc
final readonly class IssueSecuritySchemeToProjectMapping extends Dto
{
    public function __construct(
        public ?string $issueSecuritySchemeId = null,

        public ?string $projectId = null,
    ) {
    }
}
