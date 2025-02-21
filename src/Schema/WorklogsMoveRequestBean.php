<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class WorklogsMoveRequestBean extends Dto
{
    public function __construct(
        /**
         * A list of worklog IDs.
         * 
         * @var ?list<int>
         */
        public ?array $ids = null,

        /** The issue id or key of the destination issue */
        public ?string $issueIdOrKey = null,
    ) {
    }
}
