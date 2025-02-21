<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldConfigurationsDoc
final readonly class CustomFieldConfigurations extends Dto
{
    public function __construct(
        /**
         * The list of custom field configuration details.
         * 
         * @var list<ContextualConfiguration>
         */
        public array $configurations,
    ) {
    }
}
