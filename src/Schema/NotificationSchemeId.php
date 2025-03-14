<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID of a notification scheme. */
final readonly class NotificationSchemeId extends Dto
{
    public function __construct(
        /** The ID of a notification scheme. */
        public string $id,
    ) {
    }
}
