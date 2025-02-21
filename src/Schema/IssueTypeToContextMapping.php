<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Mapping of an issue type to a context. */
final readonly class IssueTypeToContextMapping extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** Whether the context is mapped to any issue type. */
        public ?bool $isAnyIssueType = null,

        /** The ID of the issue type. */
        public ?string $issueTypeId = null,
    ) {
    }
}
