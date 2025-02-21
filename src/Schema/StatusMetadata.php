<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusMetadataDoc
final readonly class StatusMetadata extends Dto
{
    public function __construct(
        /**
         * The category of the status.
         * 
         * @var 'TODO'|'IN_PROGRESS'|'DONE'|null
         */
        public ?string $category = null,

        /** The ID of the status. */
        public ?string $id = null,

        /** The name of the status. */
        public ?string $name = null,
    ) {
    }
}
