<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of a field configuration to issue type mappings. */
final class AssociateFieldConfigurationsWithIssueTypesRequest extends Dto
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
