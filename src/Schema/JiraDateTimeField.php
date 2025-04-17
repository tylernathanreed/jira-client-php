<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraDateTimeField extends Dto
{
    public function __construct(
        public JiraDateTimeInput $dateTime,

        public string $fieldId,
    ) {
    }
}
