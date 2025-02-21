<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class SecuritySchemeLevelMemberBean extends Dto
{
    public function __construct(
        /** The issue security level member type, e.g `reporter`, `group`, `user`, `projectrole`, `applicationRole`. */
        public string $type,

        /** The value corresponding to the specified member type. */
        public ?string $parameter = null,
    ) {
    }
}
