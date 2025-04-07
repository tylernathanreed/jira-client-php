<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The list of issue types. */
final readonly class StatusProjectIssueTypeUsage extends Dto
{
    public function __construct(
        /** The issue type ID. */
        public ?string $id = null,
    ) {
    }
}
