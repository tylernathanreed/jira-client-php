<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating issue type schemes */
final readonly class IssueTypeSchemePayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $defaultIssueTypeId = null,

        /** The description of the issue type scheme */
        public ?string $description = null,

        /**
         * The issue type IDs for the issue type scheme
         * 
         * @var ?list<ProjectCreateResourceIdentifier>
         * 
         * @example 'pcri:issueType:id:10001'
         */
        public ?array $issueTypeIds = null,

        /** The name of the issue type scheme */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
