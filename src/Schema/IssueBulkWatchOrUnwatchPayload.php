<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

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
    ) {
    }
}
