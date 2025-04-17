<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of scheme and new default level. */
final class DefaultLevelValue extends Dto
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
