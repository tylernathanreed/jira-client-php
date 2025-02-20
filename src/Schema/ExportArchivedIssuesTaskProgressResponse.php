<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

/** The response for status request for a running/completed export task. */
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
