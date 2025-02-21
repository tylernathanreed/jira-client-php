<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ScreenSchemeIdDoc
final readonly class ScreenSchemeId extends Dto
{
    public function __construct(
        /** The ID of the screen scheme. */
        public int $id,
    ) {
    }
}
