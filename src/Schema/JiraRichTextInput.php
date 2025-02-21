<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraRichTextInput extends Dto
{
    public function __construct(
        public ?object $adfValue = null,
    ) {
    }
}
