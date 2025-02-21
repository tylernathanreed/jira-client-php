<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraVersionFieldDoc
final readonly class JiraVersionField extends Dto
{
    public function __construct(
        public ?string $versionId = null,
    ) {
    }
}
