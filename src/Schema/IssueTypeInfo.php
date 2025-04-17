<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of an issue type. */
final class IssueTypeInfo extends Dto
{
    public function __construct(
        /** The avatar of the issue type. */
        public ?int $avatarId = null,

        /** The ID of the issue type. */
        public ?int $id = null,

        /** The name of the issue type. */
        public ?string $name = null,
    ) {
    }
}
