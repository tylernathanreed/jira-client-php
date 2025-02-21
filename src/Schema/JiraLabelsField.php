<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraLabelsFieldDoc
final readonly class JiraLabelsField extends Dto
{
    public function __construct(
        public string $bulkEditMultiSelectFieldOption,

        public string $fieldId,

        public array $labels,
    ) {
    }
}
