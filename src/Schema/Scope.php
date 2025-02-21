<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ScopeDoc
final readonly class Scope extends Dto
{
    public function __construct(
        /** The project the item has scope in. */
        public ?ProjectDetails $project = null,

        /**
         * The type of scope.
         * 
         * @var 'PROJECT'|'TEMPLATE'|null
         */
        public ?string $type = null,
    ) {
    }
}
