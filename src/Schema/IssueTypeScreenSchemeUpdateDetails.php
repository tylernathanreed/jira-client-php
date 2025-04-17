<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of an issue type screen scheme. */
final class IssueTypeScreenSchemeUpdateDetails extends Dto
{
    public function __construct(
        /**
         * The description of the issue type screen scheme.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,

        /**
         * The name of the issue type screen scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,
    ) {
    }
}
