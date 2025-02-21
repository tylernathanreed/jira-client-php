<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of custom fields identifiers which will be used to filter configurations */
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
