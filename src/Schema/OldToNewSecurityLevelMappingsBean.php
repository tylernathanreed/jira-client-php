<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class OldToNewSecurityLevelMappingsBean extends Dto
{
    public function __construct(
        /**
         * The new issue security level ID.
         * Providing null will clear the assigned old level from issues.
         */
        public string $newLevelId,

        /**
         * The old issue security level ID.
         * Providing null will remap all issues without any assigned levels.
         */
        public string $oldLevelId,
    ) {
    }
}
