<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about an project using security scheme mapping. */
final readonly class IssueSecuritySchemeToProjectMapping extends Dto
{
    public function __construct(
        public ?string $issueSecuritySchemeId = null,

        public ?string $projectId = null,
    ) {
    }
}
