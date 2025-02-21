<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraUrlFieldDoc
final readonly class JiraUrlField extends Dto
{
    public function __construct(
        public string $fieldId,

        public string $url,
    ) {
    }
}
