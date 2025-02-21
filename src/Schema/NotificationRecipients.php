<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// NotificationRecipientsDoc
final readonly class NotificationRecipients extends Dto
{
    public function __construct(
        /** Whether the notification should be sent to the issue's assignees. */
        public ?bool $assignee = null,

        /**
         * List of groupIds to receive the notification.
         * 
         * @var ?list<string>
         */
        public ?array $groupIds = null,

        /**
         * List of groups to receive the notification.
         * 
         * @var ?list<GroupName>
         */
        public ?array $groups = null,

        /** Whether the notification should be sent to the issue's reporter. */
        public ?bool $reporter = null,

        /**
         * List of users to receive the notification.
         * 
         * @var ?list<UserDetails>
         */
        public ?array $users = null,

        /** Whether the notification should be sent to the issue's voters. */
        public ?bool $voters = null,

        /** Whether the notification should be sent to the issue's watchers. */
        public ?bool $watchers = null,
    ) {
    }
}
