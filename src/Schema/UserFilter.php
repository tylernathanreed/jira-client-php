<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserFilterDoc
final readonly class UserFilter extends Dto
{
    public function __construct(
        /** Whether the filter is enabled. */
        public bool $enabled,

        /**
         * User groups autocomplete suggestion users must belong to.
         * If not provided, the default values are used.
         * A maximum of 10 groups can be provided.
         * 
         * @var ?list<string>
         */
        public ?array $groups = null,

        /**
         * Roles that autocomplete suggestion users must belong to.
         * If not provided, the default values are used.
         * A maximum of 10 roles can be provided.
         * 
         * @var ?list<int>
         */
        public ?array $roleIds = null,
    ) {
    }
}
