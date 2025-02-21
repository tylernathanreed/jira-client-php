<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraRichTextField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraRichTextInput $richText,
    ) {
    }
}
