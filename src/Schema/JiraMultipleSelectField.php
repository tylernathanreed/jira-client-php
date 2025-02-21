<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraMultipleSelectFieldDoc
final readonly class JiraMultipleSelectField extends Dto
{
    public function __construct(
        public string $fieldId,

        public array $options,
    ) {
    }
}
