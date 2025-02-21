<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Project ID details. */
final readonly class ProjectId extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public string $id,
    ) {
    }
}
