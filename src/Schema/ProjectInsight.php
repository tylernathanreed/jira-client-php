<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Http\Dto;

/** Additional details about a project. */
final class ProjectInsight extends Dto
{
    public function __construct(
        /** The last issue update time. */
        public ?DateTimeImmutable $lastIssueUpdateTime = null,

        /** Total issue count. */
        public ?int $totalIssueCount = null,
    ) {
    }
}
