<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueChangelogIdsDoc
final readonly class IssueChangelogIds extends Dto
{
    public function __construct(
        /**
         * The list of changelog IDs.
         * 
         * @var list<int>
         */
        public array $changelogIds,
    ) {
    }
}
