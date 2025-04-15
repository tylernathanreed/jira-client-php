<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class JiraDateField extends Dto
{
    public function __construct(
        public string $fieldId,

        public ?JiraDateInput $date = null,
    ) {
    }
}
