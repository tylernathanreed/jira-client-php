<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of changes to a priority scheme's priorities that require suggested priority mappings. */
final readonly class SuggestedMappingsForPrioritiesRequestBean extends Dto
{
    public function __construct(
        /**
         * The ids of priorities being removed from the scheme.
         * 
         * @var ?list<int>
         */
        public ?array $add = null,

        /**
         * The ids of priorities being removed from the scheme.
         * 
         * @var ?list<int>
         */
        public ?array $remove = null,
    ) {
    }
}
