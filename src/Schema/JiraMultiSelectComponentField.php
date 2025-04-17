<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraMultiSelectComponentField extends Dto
{
    public function __construct(
        /** @var 'ADD'|'REMOVE'|'REPLACE'|'REMOVE_ALL' */
        public string $bulkEditMultiSelectFieldOption,

        /** @var list<JiraComponentField> */
        public array $components,

        public string $fieldId,
    ) {
    }
}
