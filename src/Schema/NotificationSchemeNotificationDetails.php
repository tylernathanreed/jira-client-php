<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of a notification within a notification scheme. */
final class NotificationSchemeNotificationDetails extends Dto
{
    public function __construct(
        /** The notification type, e.g `CurrentAssignee`, `Group`, `EmailAddress`. */
        public string $notificationType,

        /** The value corresponding to the specified notification type. */
        public ?string $parameter = null,
    ) {
    }
}
