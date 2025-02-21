<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a notification associated with an event. */
final readonly class EventNotification extends Dto
{
    public function __construct(
        /** The email address. */
        public ?string $emailAddress = null,

        /** Expand options that include additional event notification details in the response. */
        public ?string $expand = null,

        /** The custom user or group field. */
        public ?FieldDetails $field = null,

        /** The specified group. */
        public ?GroupName $group = null,

        /** The ID of the notification. */
        public ?int $id = null,

        /**
         * Identifies the recipients of the notification.
         * 
         * @var 'CurrentAssignee'|'Reporter'|'CurrentUser'|'ProjectLead'|'ComponentLead'|'User'|'Group'|'ProjectRole'|'EmailAddress'|'AllWatchers'|'UserCustomField'|'GroupCustomField'|null
         */
        public ?string $notificationType = null,

        /**
         * As a group's name can change, use of `recipient` is recommended.
         * The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by `notificationType` value.
         * So, when `notificationType` is:
         * 
         *  - `User` The `parameter` is the user account ID
         *  - `Group` The `parameter` is the group name
         *  - `ProjectRole` The `parameter` is the project role ID
         *  - `UserCustomField` The `parameter` is the ID of the custom field
         *  - `GroupCustomField` The `parameter` is the ID of the custom field.
         */
        public ?string $parameter = null,

        /** The specified project role. */
        public ?ProjectRole $projectRole = null,

        /**
         * The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by the `notificationType` value.
         * So, when `notificationType` is:
         * 
         *  - `User`, `recipient` is the user account ID
         *  - `Group`, `recipient` is the group ID
         *  - `ProjectRole`, `recipient` is the project role ID
         *  - `UserCustomField`, `recipient` is the ID of the custom field
         *  - `GroupCustomField`, `recipient` is the ID of the custom field.
         */
        public ?string $recipient = null,

        /** The specified user. */
        public ?UserDetails $user = null,
    ) {
    }
}
