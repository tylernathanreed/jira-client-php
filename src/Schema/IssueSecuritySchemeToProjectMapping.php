<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details about an project using security scheme mapping. */
final class IssueSecuritySchemeToProjectMapping extends Dto
{
    public function __construct(
        public ?string $issueSecuritySchemeId = null,

        public ?string $projectId = null,
    ) {
    }
}
