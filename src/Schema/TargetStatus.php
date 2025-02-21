<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// TargetStatusDoc
final readonly class TargetStatus extends Dto
{
    public function __construct(
        /**
         * An object with the key as the ID of the target status and value with the list of the IDs of the current source statuses.
         * 
         * @var array<string,list<string>>
         */
        public array $statuses,
    ) {
    }
}
