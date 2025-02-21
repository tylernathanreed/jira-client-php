<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// ExportArchivedIssuesTaskProgressResponseDoc
final readonly class ExportArchivedIssuesTaskProgressResponse extends Dto
{
    public function __construct(
        public ?string $fileUrl = null,

        public ?string $payload = null,

        public ?int $progress = null,

        public ?string $status = null,

        public ?DateTimeImmutable $submittedTime = null,

        public ?string $taskId = null,
    ) {
    }
}
