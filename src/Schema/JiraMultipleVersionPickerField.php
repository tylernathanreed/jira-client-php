<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraMultipleVersionPickerField extends Dto
{
    public function __construct(
        /** @var 'ADD'|'REMOVE'|'REPLACE'|'REMOVE_ALL' */
        public string $bulkEditMultiSelectFieldOption,

        public string $fieldId,

        /** @var list<JiraVersionField> */
        public array $versions,
    ) {
    }
}
