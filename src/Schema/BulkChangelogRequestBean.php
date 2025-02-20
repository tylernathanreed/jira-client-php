<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class BulkChangelogRequestBean extends Dto
{
    public function __construct(
        /**
         * List of issue IDs/keys to fetch changelogs for.
         * 
         * @var list<string>
         */
        public array $issueIdsOrKeys,

        /**
         * List of field IDs to filter changelogs.
         * 
         * @var ?list<string>
         */
        public ?array $fieldIds = null,

        /** The maximum number of items to return per page. */
        public ?int $maxResults = 1000,

        /** The cursor for pagination. */
        public ?string $nextPageToken = null,
    ) {
    }
}
