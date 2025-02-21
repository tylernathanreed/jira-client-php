<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeScreenSchemeIdDoc
final readonly class IssueTypeScreenSchemeId extends Dto
{
    public function __construct(
        /** The ID of the issue type screen scheme. */
        public string $id,
    ) {
    }
}
