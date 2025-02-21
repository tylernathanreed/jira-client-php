<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeSchemeMappingDoc
final readonly class IssueTypeSchemeMapping extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public string $issueTypeId,

        /** The ID of the issue type scheme. */
        public string $issueTypeSchemeId,
    ) {
    }
}
