<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID of an issue type screen scheme. */
final readonly class IssueTypeScreenSchemeId extends Dto
{
    public function __construct(
        /** The ID of the issue type screen scheme. */
        public string $id,
    ) {
    }
}
