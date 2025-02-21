<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The scope of the status. */
final readonly class StatusScope extends Dto
{
    public function __construct(
        /**
         * The scope of the status.
         * `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
         * 
         * @var 'PROJECT'|'GLOBAL'
         */
        public string $type,

        public ?ProjectId $project = null,
    ) {
    }
}
