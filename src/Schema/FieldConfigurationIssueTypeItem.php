<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The field configuration for an issue type. */
final readonly class FieldConfigurationIssueTypeItem extends Dto
{
    public function __construct(
        /** The ID of the field configuration. */
        public string $fieldConfigurationId,

        /** The ID of the field configuration scheme. */
        public string $fieldConfigurationSchemeId,

        /**
         * The ID of the issue type or *default*.
         * When set to *default* this field configuration issue type item applies to all issue types without a field configuration.
         */
        public string $issueTypeId,
    ) {
    }
}
