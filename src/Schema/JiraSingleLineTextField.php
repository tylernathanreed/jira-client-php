<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraSingleLineTextField extends Dto
{
    public function __construct(
        public string $fieldId,

        public string $text,
    ) {
    }
}
