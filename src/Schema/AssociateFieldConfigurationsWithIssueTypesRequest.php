<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AssociateFieldConfigurationsWithIssueTypesRequestDoc
final readonly class AssociateFieldConfigurationsWithIssueTypesRequest extends Dto
{
    public function __construct(
        /**
         * Field configuration to issue type mappings.
         * 
         * @var list<FieldConfigurationToIssueTypeMapping>
         */
        public array $mappings,
    ) {
    }
}
