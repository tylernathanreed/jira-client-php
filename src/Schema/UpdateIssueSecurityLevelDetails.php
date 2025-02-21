<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of issue security scheme level. */
final readonly class UpdateIssueSecurityLevelDetails extends Dto
{
    public function __construct(
        /** The description of the issue security scheme level. */
        public ?string $description = null,

        /**
         * The name of the issue security scheme level.
         * Must be unique.
         */
        public ?string $name = null,
    ) {
    }
}
