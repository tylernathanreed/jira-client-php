<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// BulkOperationProgressDoc
final readonly class BulkOperationProgress extends Dto
{
    public function __construct(
        /** A timestamp of when the task was submitted. */
        public ?DateTimeImmutable $created = null,

        /**
         * Map of issue IDs for which the operation failed and that the user has permission to view, to their one or more reasons for failure.
         * These reasons are open-ended text descriptions of the error and are not selected from a predefined list of standard reasons.
         * 
         * @var array<string,list<string>>
         */
        public ?array $failedAccessibleIssues = null,

        /** The number of issues that are either invalid or issues that the user doesn't have permission to view, regardless of the success or failure of the operation. */
        public ?int $invalidOrInaccessibleIssueCount = null,

        /**
         * List of issue IDs for which the operation was successful and that the user has permission to view.
         * 
         * @var ?list<int>
         */
        public ?array $processedAccessibleIssues = null,

        /** Progress of the task as a percentage. */
        public ?int $progressPercent = null,

        /** A timestamp of when the task was started. */
        public ?DateTimeImmutable $started = null,

        /**
         * The status of the task.
         * 
         * @var 'ENQUEUED'|'RUNNING'|'COMPLETE'|'FAILED'|'CANCEL_REQUESTED'|'CANCELLED'|'DEAD'|null
         */
        public ?string $status = null,

        public ?User $submittedBy = null,

        /** The ID of the task. */
        public ?string $taskId = null,

        /** The number of issues that the bulk operation was attempted on. */
        public ?int $totalIssueCount = null,

        /** A timestamp of when the task progress was last updated. */
        public ?DateTimeImmutable $updated = null,
    ) {
    }
}
