<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DefaultLevelValueDoc
final readonly class DefaultLevelValue extends Dto
{
    public function __construct(
        /**
         * The ID of the issue security level to set as default for the specified scheme.
         * Providing null will reset the default level.
         */
        public string $defaultLevelId,

        /** The ID of the issue security scheme to set default level for. */
        public string $issueSecuritySchemeId,
    ) {
    }
}
