<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Project ID details. */
final class ProjectId extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public string $id,
    ) {
    }
}
