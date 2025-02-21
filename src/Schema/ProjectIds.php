<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIdsDoc
final readonly class ProjectIds extends Dto
{
    public function __construct(
        /**
         * The IDs of projects.
         * 
         * @var list<string>
         */
        public array $projectIds,
    ) {
    }
}
