<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraColorInputDoc
final readonly class JiraColorInput extends Dto
{
    public function __construct(
        public string $name,
    ) {
    }
}
