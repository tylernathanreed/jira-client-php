<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Count of a version's unresolved issues. */
final readonly class VersionUnresolvedIssuesCount extends Dto
{
    public function __construct(
        /** Count of issues. */
        public ?int $issuesCount = null,

        /** Count of unresolved issues. */
        public ?int $issuesUnresolvedCount = null,

        /** The URL of these count details. */
        public ?string $self = null,
    ) {
    }
}
