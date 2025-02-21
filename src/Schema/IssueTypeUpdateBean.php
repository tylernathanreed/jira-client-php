<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IssueTypeUpdateBean extends Dto
{
    public function __construct(
        /** The ID of an issue type avatar. */
        public ?int $avatarId = null,

        /** The description of the issue type. */
        public ?string $description = null,

        /**
         * The unique name for the issue type.
         * The maximum length is 60 characters.
         */
        public ?string $name = null,
    ) {
    }
}
