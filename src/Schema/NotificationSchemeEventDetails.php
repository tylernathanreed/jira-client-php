<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a notification scheme event. */
final readonly class NotificationSchemeEventDetails extends Dto
{
    public function __construct(
        /** The ID of the event. */
        public NotificationSchemeEventTypeId $event,

        /**
         * The list of notifications mapped to a specified event.
         * 
         * @var list<NotificationSchemeNotificationDetails>
         */
        public array $notifications,
    ) {
    }
}
