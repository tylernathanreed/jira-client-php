<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectWithDataPolicyDoc
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
