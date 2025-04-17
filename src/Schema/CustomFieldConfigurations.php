<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of configurations for a custom field. */
final class CustomFieldConfigurations extends Dto
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
