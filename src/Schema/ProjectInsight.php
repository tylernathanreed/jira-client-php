<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// ProjectInsightDoc
final readonly class ProjectInsight extends Dto
{
    public function __construct(
        /** The last issue update time. */
        public ?DateTimeImmutable $lastIssueUpdateTime = null,

        /** Total issue count. */
        public ?int $totalIssueCount = null,
    ) {
    }
}
