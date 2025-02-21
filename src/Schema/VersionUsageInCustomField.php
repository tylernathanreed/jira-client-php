<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VersionUsageInCustomFieldDoc
final readonly class VersionUsageInCustomField extends Dto
{
    public function __construct(
        /** The ID of the custom field. */
        public ?int $customFieldId = null,

        /** The name of the custom field. */
        public ?string $fieldName = null,

        /** Count of the issues where the custom field contains the version. */
        public ?int $issueCountWithVersionInCustomField = null,
    ) {
    }
}
