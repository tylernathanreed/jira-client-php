<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID or key of a linked issue. */
final readonly class LinkedIssue extends Dto
{
    public function __construct(
        /** The fields associated with the issue. */
        public ?Fields $fields = null,

        /**
         * The ID of an issue.
         * Required if `key` isn't provided.
         */
        public ?string $id = null,

        /**
         * The key of an issue.
         * Required if `id` isn't provided.
         */
        public ?string $key = null,

        /** The URL of the issue. */
        public ?string $self = null,
    ) {
    }
}
