<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class PrioritySchemeChangesWithoutMappings extends Dto
{
    public function __construct(
        /**
         * Affected entity ids.
         * 
         * @var list<int>
         */
        public array $ids,
    ) {
    }
}
