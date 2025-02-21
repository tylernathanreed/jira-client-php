<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusMigrationDoc
final readonly class StatusMigration extends Dto
{
    public function __construct(
        /** The new status ID. */
        public string $newStatusReference,

        /** The old status ID. */
        public string $oldStatusReference,
    ) {
    }
}
