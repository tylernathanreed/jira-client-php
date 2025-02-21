<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// NotificationSchemeEventTypeIdDoc
final readonly class NotificationSchemeEventTypeId extends Dto
{
    public function __construct(
        /** The ID of the notification scheme event. */
        public string $id,
    ) {
    }
}
