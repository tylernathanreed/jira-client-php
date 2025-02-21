<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeWithStatusDoc
final readonly class IssueTypeWithStatus extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public string $id,

        /** The name of the issue type. */
        public string $name,

        /** The URL of the issue type's status details. */
        public string $self,

        /**
         * List of status details for the issue type.
         * 
         * @var list<StatusDetails>
         */
        public array $statuses,

        /** Whether this issue type represents subtasks. */
        public bool $subtask,
    ) {
    }
}
