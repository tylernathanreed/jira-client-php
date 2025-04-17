<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The ID of the issue security scheme. */
final class SecuritySchemeId extends Dto
{
    public function __construct(
        /** The ID of the issue security scheme. */
        public string $id,
    ) {
    }
}
