<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraMultipleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        /** @var list<JiraGroupInput> */
        public array $groups,
    ) {
    }
}
