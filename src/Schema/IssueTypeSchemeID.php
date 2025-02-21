<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID of an issue type scheme. */
final readonly class IssueTypeSchemeID extends Dto
{
    public function __construct(
        /** The ID of the issue type scheme. */
        public string $issueTypeSchemeId,
    ) {
    }
}
