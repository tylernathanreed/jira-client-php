<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a notification scheme. */
final readonly class NotificationScheme extends Dto
{
    public function __construct(
        /** The description of the notification scheme. */
        public ?string $description = null,

        /** Expand options that include additional notification scheme details in the response. */
        public ?string $expand = null,

        /** The ID of the notification scheme. */
        public ?int $id = null,

        /** The name of the notification scheme. */
        public ?string $name = null,

        /**
         * The notification events and associated recipients.
         * 
         * @var ?list<NotificationSchemeEvent>
         */
        public ?array $notificationSchemeEvents = null,

        /**
         * The list of project IDs associated with the notification scheme.
         * 
         * @var ?list<int>
         */
        public ?array $projects = null,

        /** The scope of the notification scheme. */
        public ?Scope $scope = null,

        public ?string $self = null,
    ) {
    }
}
