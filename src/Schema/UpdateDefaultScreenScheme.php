<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID of a screen scheme. */
final readonly class UpdateDefaultScreenScheme extends Dto
{
    public function __construct(
        /** The ID of the screen scheme. */
        public string $screenSchemeId,
    ) {
    }
}
