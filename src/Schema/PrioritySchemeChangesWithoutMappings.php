<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class PrioritySchemeChangesWithoutMappings extends Dto
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
