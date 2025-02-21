<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about data policies for a project. */
final readonly class ProjectWithDataPolicy extends Dto
{
    public function __construct(
        /** Data policy. */
        public ?ProjectDataPolicy $dataPolicy = null,

        /** The project ID. */
        public ?int $id = null,
    ) {
    }
}
