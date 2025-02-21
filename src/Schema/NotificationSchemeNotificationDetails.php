<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// NotificationSchemeNotificationDetailsDoc
final readonly class NotificationSchemeNotificationDetails extends Dto
{
    public function __construct(
        /** The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`. */
        public string $notificationType,

        /** The value corresponding to the specified notification type. */
        public ?string $parameter = null,
    ) {
    }
}
