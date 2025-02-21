<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Deprecated.
 * See the "deprecation notice" for details
 * 
 * Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the requested workflows.
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
 */
final readonly class ProjectIssueTypes extends Dto
{
    public function __construct(
        /**
         * IDs of the issue types
         * 
         * @var ?list<string>
         */
        public ?array $issueTypes = null,

        public ?ProjectId $project = null,
    ) {
    }
}
