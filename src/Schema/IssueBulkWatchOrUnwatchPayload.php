<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Issue Bulk Watch Or Unwatch Payload */
final readonly class IssueBulkWatchOrUnwatchPayload extends Dto
{
    public function __construct(
        /**
         * List of issue IDs or keys which are to be bulk watched or unwatched.
         * These IDs or keys can be from different projects and issue types.
         * 
         * @var list<string>
         */
        public array $selectedIssueIdsOrKeys,

        /**
         * A boolean value that indicates whether to send a bulk change notification when the issues are being watched or unwatched
         * 
         * If `true`, dispatches a bulk notification email to users about the updates.
         */
        public ?bool $sendBulkNotification = true,
    ) {
    }
}
