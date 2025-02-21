<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the status being created. */
final readonly class StatusCreate extends Dto
{
    public function __construct(
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
