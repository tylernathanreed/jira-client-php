<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraDateTimeFieldDoc
final readonly class JiraDateTimeField extends Dto
{
    public function __construct(
        public JiraDateTimeInput $dateTime,

        public string $fieldId,
    ) {
    }
}
