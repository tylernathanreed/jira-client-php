<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a notification. */
final readonly class Notification extends Dto
{
    public function __construct(
        /** The HTML body of the email notification for the issue. */
        public ?string $htmlBody = null,

        /** Restricts the notifications to users with the specified permissions. */
        public ?NotificationRecipientsRestrictions $restrict = null,

        /**
         * The subject of the email notification for the issue.
         * If this is not specified, then the subject is set to the issue key and summary.
         */
        public ?string $subject = null,

        /** The plain text body of the email notification for the issue. */
        public ?string $textBody = null,

        /** The recipients of the email notification for the issue. */
        public ?NotificationRecipients $to = null,
    ) {
    }
}
