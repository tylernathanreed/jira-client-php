<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AddNotificationsDetailsDoc
final readonly class AddNotificationsDetails extends Dto
{
    public function __construct(
        /**
         * The list of notifications which should be added to the notification scheme.
         * 
         * @var list<NotificationSchemeEventDetails>
         */
        public array $notificationSchemeEvents,
    ) {
    }
}
