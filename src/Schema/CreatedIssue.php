<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreatedIssueDoc
final readonly class CreatedIssue extends Dto
{
    public function __construct(
        /** The ID of the created issue or subtask. */
        public ?string $id = null,

        /** The key of the created issue or subtask. */
        public ?string $key = null,

        /** The URL of the created issue or subtask. */
        public ?string $self = null,

        /** The response code and messages related to any requested transition. */
        public ?NestedResponse $transition = null,

        /** The response code and messages related to any requested watchers. */
        public ?NestedResponse $watchers = null,
    ) {
    }
}
