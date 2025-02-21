<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraLabelsInputDoc
final readonly class JiraLabelsInput extends Dto
{
    public function __construct(
        public string $name,
    ) {
    }
}
