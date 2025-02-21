<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue type screen scheme. */
final readonly class IssueTypeScreenScheme extends Dto
{
    public function __construct(
        /** The ID of the issue type screen scheme. */
        public string $id,

        /** The name of the issue type screen scheme. */
        public string $name,

        /** The description of the issue type screen scheme. */
        public ?string $description = null,
    ) {
    }
}
