<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraDateTimeField extends Dto
{
    public function __construct(
        public JiraDateTimeInput $dateTime,

        public string $fieldId,
    ) {
    }
}
