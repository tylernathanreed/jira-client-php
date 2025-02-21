<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraRichTextFieldDoc
final readonly class JiraRichTextField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraRichTextInput $richText,
    ) {
    }
}
