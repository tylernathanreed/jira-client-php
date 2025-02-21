<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// RequiredMappingByIssueTypeDoc
final readonly class RequiredMappingByIssueType extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public ?string $issueTypeId = null,

        /**
         * The status IDs requiring mapping.
         * 
         * @var ?list<string>
         */
        public ?array $statusIds = null,
    ) {
    }
}
