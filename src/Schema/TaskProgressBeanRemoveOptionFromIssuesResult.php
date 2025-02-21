<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// TaskProgressBeanRemoveOptionFromIssuesResultDoc
final readonly class TaskProgressBeanRemoveOptionFromIssuesResult extends Dto
{
    public function __construct(
        /** The execution time of the task, in milliseconds. */
        public int $elapsedRuntime,

        /** The ID of the task. */
        public string $id,

        /** A timestamp recording when the task progress was last updated. */
        public int $lastUpdate,

        /** The progress of the task, as a percentage complete. */
        public int $progress,

        /** The URL of the task. */
        public string $self,

        /**
         * The status of the task.
         * 
         * @var 'ENQUEUED'|'RUNNING'|'COMPLETE'|'FAILED'|'CANCEL_REQUESTED'|'CANCELLED'|'DEAD'
         */
        public string $status,

        /** A timestamp recording when the task was submitted. */
        public int $submitted,

        /** The ID of the user who submitted the task. */
        public int $submittedBy,

        /** The description of the task. */
        public ?string $description = null,

        /** A timestamp recording when the task was finished. */
        public ?int $finished = null,

        /** Information about the progress of the task. */
        public ?string $message = null,

        /** The result of the task execution. */
        public ?RemoveOptionFromIssuesResult $result = null,

        /** A timestamp recording when the task was started. */
        public ?int $started = null,
    ) {
    }
}
