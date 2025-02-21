<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeSchemeIDDoc
final readonly class IssueTypeSchemeID extends Dto
{
    public function __construct(
        /** The ID of the issue type scheme. */
        public string $issueTypeSchemeId,
    ) {
    }
}
