<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// MultiIssueEntityPropertiesDoc
final readonly class MultiIssueEntityProperties extends Dto
{
    public function __construct(
        /**
         * A list of issue IDs and their respective properties.
         * 
         * @var ?list<IssueEntityPropertiesForMultiUpdate>
         */
        public ?array $issues = null,
    ) {
    }
}
