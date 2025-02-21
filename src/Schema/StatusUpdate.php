<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusUpdateDoc
final readonly class StatusUpdate extends Dto
{
    public function __construct(
        /** The ID of the status. */
        public string $id,

        /** The name of the status. */
        public string $name,

        /**
         * The category of the status.
         * 
         * @var 'TODO'|'IN_PROGRESS'|'DONE'
         */
        public string $statusCategory,

        /** The description of the status. */
        public ?string $description = null,
    ) {
    }
}
