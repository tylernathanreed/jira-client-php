<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraMultipleVersionPickerFieldDoc
final readonly class JiraMultipleVersionPickerField extends Dto
{
    public function __construct(
        public string $bulkEditMultiSelectFieldOption,

        public string $fieldId,

        public array $versions,
    ) {
    }
}
