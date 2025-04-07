<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** A list of project IDs. */
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
