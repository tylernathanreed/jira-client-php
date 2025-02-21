<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID of an event that is being mapped to notifications. */
final readonly class NotificationSchemeEventTypeId extends Dto
{
    public function __construct(
        /** The ID of the notification scheme event. */
        public string $id,
    ) {
    }
}
