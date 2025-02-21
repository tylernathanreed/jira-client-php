<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ConfigurationsListParametersDoc
final readonly class ConfigurationsListParameters extends Dto
{
    public function __construct(
        /**
         * List of IDs or keys of the custom fields.
         * It can be a mix of IDs and keys in the same query.
         * 
         * @var list<string>
         */
        public array $fieldIdsOrKeys,
    ) {
    }
}
