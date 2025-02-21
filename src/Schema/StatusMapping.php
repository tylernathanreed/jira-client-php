<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusMappingDoc
final readonly class StatusMapping extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public string $issueTypeId,

        /** The ID of the new status. */
        public string $newStatusId,

        /** The ID of the status. */
        public string $statusId,
    ) {
    }
}
