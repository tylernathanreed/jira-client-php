<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SuggestedMappingsRequestBeanDoc
final readonly class SuggestedMappingsRequestBean extends Dto
{
    public function __construct(
        /** The maximum number of results that could be on the page. */
        public ?int $maxResults = null,

        /** The priority changes in the scheme. */
        public ?SuggestedMappingsForPrioritiesRequestBean $priorities = null,

        /** The project changes in the scheme. */
        public ?SuggestedMappingsForProjectsRequestBean $projects = null,

        /** The id of the priority scheme. */
        public ?int $schemeId = null,

        /** The index of the first item returned on the page. */
        public ?int $startAt = null,
    ) {
    }
}
