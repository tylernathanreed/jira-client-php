<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraSingleLineTextFieldDoc
final readonly class JiraSingleLineTextField extends Dto
{
    public function __construct(
        public string $fieldId,

        public string $text,
    ) {
    }
}
