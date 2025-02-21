<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VersionIssueCountsDoc
final readonly class VersionIssueCounts extends Dto
{
    public function __construct(
        /**
         * List of custom fields using the version.
         * 
         * @var ?list<VersionUsageInCustomField>
         */
        public ?array $customFieldUsage = null,

        /** Count of issues where a version custom field is set to the version. */
        public ?int $issueCountWithCustomFieldsShowingVersion = null,

        /** Count of issues where the `affectedVersion` is set to the version. */
        public ?int $issuesAffectedCount = null,

        /** Count of issues where the `fixVersion` is set to the version. */
        public ?int $issuesFixedCount = null,

        /** The URL of these count details. */
        public ?string $self = null,
    ) {
    }
}
