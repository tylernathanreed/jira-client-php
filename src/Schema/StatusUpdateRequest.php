<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of statuses that will be updated. */
final readonly class StatusUpdateRequest extends Dto
{
    public function __construct(
        /**
         * The list of statuses that will be updated.
         * 
         * @var list<StatusUpdate>
         */
        public array $statuses,
    ) {
    }
}
