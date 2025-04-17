<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Issue type screen scheme with a list of the projects that use it. */
final class IssueTypeScreenSchemesProjects extends Dto
{
    public function __construct(
        /** Details of an issue type screen scheme. */
        public IssueTypeScreenScheme $issueTypeScreenScheme,

        /**
         * The IDs of the projects using the issue type screen scheme.
         * 
         * @var list<string>
         */
        public array $projectIds,
    ) {
    }
}
