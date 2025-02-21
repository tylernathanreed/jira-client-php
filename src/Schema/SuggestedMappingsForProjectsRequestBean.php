<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of changes to a priority scheme's projects that require suggested priority mappings. */
final readonly class SuggestedMappingsForProjectsRequestBean extends Dto
{
    public function __construct(
        /**
         * The ids of projects being added to the scheme.
         * 
         * @var ?list<int>
         */
        public ?array $add = null,
    ) {
    }
}
