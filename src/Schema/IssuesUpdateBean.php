<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssuesUpdateBeanDoc
final readonly class IssuesUpdateBean extends Dto
{
    public function __construct(
        public ?array $issueUpdates = null,
    ) {
    }
}
