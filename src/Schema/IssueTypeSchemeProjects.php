<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Issue type scheme with a list of the projects that use it. */
final readonly class IssueTypeSchemeProjects extends Dto
{
    public function __construct(
        /** Details of an issue type scheme. */
        public IssueTypeScheme $issueTypeScheme,

        /**
         * The IDs of the projects using the issue type scheme.
         * 
         * @var list<string>
         */
        public array $projectIds,
    ) {
    }
}
