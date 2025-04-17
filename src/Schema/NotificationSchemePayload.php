<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a notification scheme.
 * The user has to supply the ID for the default notification scheme.
 * For CMP this is provided in the project payload and should be left empty, for TMP it's provided using this payload
 */
final class NotificationSchemePayload extends Dto
{
    public function __construct(
        /** The description of the notification scheme */
        public ?string $description = null,

        /** The name of the notification scheme */
        public ?string $name = null,

        /**
         * The events and notifications for the notification scheme
         * 
         * @var ?list<NotificationSchemeEventPayload>
         */
        public ?array $notificationSchemeEvents = null,

        /**
         * The strategy to use when there is a conflict with an existing entity
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
