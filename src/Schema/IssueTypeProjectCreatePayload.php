<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating issue types in a project */
final readonly class IssueTypeProjectCreatePayload extends Dto
{
    public function __construct(
        /**
         * Defines the issue type hierarhy to be created and used during this project creation.
         * This will only add new levels if there isn't an existing level
         * 
         * @var ?list<IssueTypeHierarchyPayload>
         */
        public ?array $issueTypeHierarchy = null,

        public ?IssueTypeSchemePayload $issueTypeScheme = null,

        /**
         * Only needed if you want to create issue types, you can otherwise use the ids of issue types in the scheme configuration
         * 
         * @var ?list<IssueTypePayload>
         */
        public ?array $issueTypes = null,
    ) {
    }
}
