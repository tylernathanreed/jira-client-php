<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The mapping of old to new status ID. */
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
