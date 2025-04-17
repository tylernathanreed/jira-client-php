<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraRichTextField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraRichTextInput $richText,
    ) {
    }
}
