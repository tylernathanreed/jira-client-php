<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The ID of the issue security scheme. */
final readonly class SecuritySchemeId extends Dto
{
    public function __construct(
        /** The ID of the issue security scheme. */
        public string $id,
    ) {
    }
}
