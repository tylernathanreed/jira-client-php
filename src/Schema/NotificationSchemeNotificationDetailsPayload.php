<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The configuration for notification recipents */
final readonly class NotificationSchemeNotificationDetailsPayload extends Dto
{
    public function __construct(
        /** The type of notification. */
        public ?string $notificationType = null,

        /** The parameter of the notification, should be eiither null if not required, or PCRI. */
        public ?string $parameter = null,
    ) {
    }
}
