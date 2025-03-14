<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GlobalScopeBean extends Dto
{
    public function __construct(
        /**
         * Defines the behavior of the option in the global context.If notSelectable is set, the option cannot be set as the field's value.
         * This is useful for archiving an option that has previously been selected but shouldn't be used anymore.If defaultValue is set, the option is selected by default.
         * 
         * @var ?list<string>
         */
        public ?array $attributes = null,
    ) {
    }
}
