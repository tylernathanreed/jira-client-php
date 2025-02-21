<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of changelogs that belong to single issue */
final readonly class IssueChangeLog extends Dto
{
    public function __construct(
        /**
         * List of changelogs that belongs to given issueId.
         * 
         * @var ?list<Changelog>
         */
        public ?array $changeHistories = null,

        /** The ID of the issue. */
        public ?string $issueId = null,
    ) {
    }
}
