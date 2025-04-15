<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating a status */
final readonly class StatusPayload extends Dto
{
    public function __construct(
        /** The description of the status */
        public ?string $description = null,

        /** The name of the status */
        public ?string $name = null,

        /**
         * The conflict strategy for the status already exists.
         * FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters; NEW - Create a new entity
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The status category of the status.
         * The value is case-sensitive.
         * 
         * @var 'TODO'|'IN_PROGRESS'|'DONE'|null
         */
        public ?string $statusCategory = null,
    ) {
    }
}
