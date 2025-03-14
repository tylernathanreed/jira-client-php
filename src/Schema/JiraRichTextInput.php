<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraRichTextInput extends Dto
{
    public function __construct(
        /** @var array<string,mixed> */
        public ?array $adfValue = null,
    ) {
    }
}
