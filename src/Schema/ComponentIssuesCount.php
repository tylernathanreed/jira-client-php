<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ComponentIssuesCountDoc
final readonly class ComponentIssuesCount extends Dto
{
    public function __construct(
        /** The count of issues assigned to a component. */
        public ?int $issueCount = null,

        /** The URL for this count of issues for a component. */
        public ?string $self = null,
    ) {
    }
}
