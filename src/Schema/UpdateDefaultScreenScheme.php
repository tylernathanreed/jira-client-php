<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateDefaultScreenSchemeDoc
final readonly class UpdateDefaultScreenScheme extends Dto
{
    public function __construct(
        /** The ID of the screen scheme. */
        public string $screenSchemeId,
    ) {
    }
}
