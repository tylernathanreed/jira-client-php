<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a notification scheme event.
 * Defines which notifications should be sent for a specific event
 */
final readonly class NotificationSchemeEventPayload extends Dto
{
    public function __construct(
        public ?NotificationSchemeEventIDPayload $event = null,

        /**
         * The configuration for notification recipents
         * 
         * @var ?list<NotificationSchemeNotificationDetailsPayload>
         */
        public ?array $notifications = null,
    ) {
    }
}
