<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraMultiSelectComponentField extends Dto
{
    public function __construct(
        public string $bulkEditMultiSelectFieldOption,

        public array $components,

        public string $fieldId,
    ) {
    }
}
