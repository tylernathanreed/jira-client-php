<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Details about a notification scheme event. */
final readonly class NotificationSchemeEvent extends Dto
{
    public function __construct(
        public ?NotificationEvent $event = null,

        /** @var ?list<EventNotification> */
        public ?array $notifications = null,
    ) {
    }
}
