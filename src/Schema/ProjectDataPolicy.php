<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details about data policy. */
final class ProjectDataPolicy extends Dto
{
    public function __construct(
        /** Whether the project contains any content inaccessible to the requesting application. */
        public ?bool $anyContentBlocked = null,
    ) {
    }
}
