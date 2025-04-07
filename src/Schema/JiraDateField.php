<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraDateField extends Dto
{
    public function __construct(
        public string $fieldId,

        public ?JiraDateInput $date = null,
    ) {
    }
}
