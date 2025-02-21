<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SecuritySchemeIdDoc
final readonly class SecuritySchemeId extends Dto
{
    public function __construct(
        /** The ID of the issue security scheme. */
        public string $id,
    ) {
    }
}
