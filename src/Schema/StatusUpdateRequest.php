<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The list of statuses that will be updated. */
final class StatusUpdateRequest extends Dto
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
