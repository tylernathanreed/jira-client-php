<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The ID of a notification scheme. */
final class NotificationSchemeId extends Dto
{
    public function __construct(
        /** The ID of a notification scheme. */
        public string $id,
    ) {
    }
}
