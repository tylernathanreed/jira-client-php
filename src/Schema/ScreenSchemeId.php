<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The ID of a screen scheme. */
final class ScreenSchemeId extends Dto
{
    public function __construct(
        /** The ID of the screen scheme. */
        public int $id,
    ) {
    }
}
