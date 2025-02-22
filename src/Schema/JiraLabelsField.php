<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraLabelsField extends Dto
{
    public function __construct(
        /** @var 'ADD'|'REMOVE'|'REPLACE'|'REMOVE_ALL' */
        public string $bulkEditMultiSelectFieldOption,

        public string $fieldId,

        /** @var list<JiraLabelsInput> */
        public array $labels,
    ) {
    }
}
