<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusMappingDTODoc
final readonly class StatusMappingDTO extends Dto
{
    public function __construct(
        /** The issue type for the status mapping. */
        public string $issueTypeId,

        /** The project for the status mapping. */
        public string $projectId,

        /**
         * The list of old and new status ID mappings for the specified project and issue type.
         * 
         * @var list<StatusMigration>
         */
        public array $statusMigrations,
    ) {
    }
}
