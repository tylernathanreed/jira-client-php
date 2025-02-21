<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the group membership or permissions needed to receive the notification. */
final readonly class NotificationRecipientsRestrictions extends Dto
{
    public function __construct(
        /**
         * List of groupId memberships required to receive the notification.
         * 
         * @var ?list<string>
         */
        public ?array $groupIds = null,

        /**
         * List of group memberships required to receive the notification.
         * 
         * @var ?list<GroupName>
         */
        public ?array $groups = null,

        /**
         * List of permissions required to receive the notification.
         * 
         * @var ?list<RestrictedPermission>
         */
        public ?array $permissions = null,
    ) {
    }
}
