<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldConfigurationToIssueTypeMappingDoc
final readonly class FieldConfigurationToIssueTypeMapping extends Dto
{
    public function __construct(
        /** The ID of the field configuration. */
        public string $fieldConfigurationId,

        /**
         * The ID of the issue type or *default*.
         * When set to *default* this field configuration issue type item applies to all issue types without a field configuration.
         * An issue type can be included only once in a request.
         */
        public string $issueTypeId,
    ) {
    }
}
