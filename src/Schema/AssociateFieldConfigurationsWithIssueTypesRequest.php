<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a field configuration to issue type mappings. */
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
