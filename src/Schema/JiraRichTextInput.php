<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraRichTextInputDoc
final readonly class JiraRichTextInput extends Dto
{
    public function __construct(
        public ?object $adfValue = null,
    ) {
    }
}
