<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload for creating an issue type hierarchy */
final readonly class IssueTypeHierarchyPayload extends Dto
{
    public function __construct(
        /**
         * The hierarchy level of the issue type.
         * 0, 1, 2, 3 ..
         * n; Negative values for subtasks
         */
        public ?int $hierarchyLevel = null,

        /** The name of the issue type */
        public ?string $name = null,

        /**
         * The conflict strategy to use when the issue type already exists.
         * FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
