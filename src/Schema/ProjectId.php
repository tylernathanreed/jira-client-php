<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIdDoc
final readonly class ProjectId extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public string $id,
    ) {
    }
}
