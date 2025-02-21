<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an notification scheme. */
final readonly class CreateNotificationSchemeDetails extends Dto
{
    public function __construct(
        /**
         * The name of the notification scheme.
         * Must be unique (case-insensitive).
         */
        public string $name,

        /** The description of the notification scheme. */
        public ?string $description = null,

        /**
         * The list of notifications which should be added to the notification scheme.
         * 
         * @var ?list<NotificationSchemeEventDetails>
         */
        public ?array $notificationSchemeEvents = null,
    ) {
    }
}
