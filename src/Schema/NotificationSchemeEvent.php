<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// NotificationSchemeEventDoc
final readonly class NotificationSchemeEvent extends Dto
{
    public function __construct(
        public ?NotificationEvent $event = null,

        public ?array $notifications = null,
    ) {
    }
}
