<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of required status mappings by issue type. */
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
