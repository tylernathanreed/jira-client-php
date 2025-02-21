<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// NotificationEventDoc
final readonly class NotificationEvent extends Dto
{
    public function __construct(
        /** The description of the event. */
        public ?string $description = null,

        /**
         * The ID of the event.
         * The event can be a "Jira system event" or a "custom event".
         * 
         * @link https://confluence.atlassian.com/x/8YdKLg#Creatinganotificationscheme-eventsEvents
         * @link https://confluence.atlassian.com/x/AIlKLg
         */
        public ?int $id = null,

        /** The name of the event. */
        public ?string $name = null,

        /**
         * The template of the event.
         * Only custom events configured by Jira administrators have template.
         */
        public ?NotificationEvent $templateEvent = null,
    ) {
    }
}
