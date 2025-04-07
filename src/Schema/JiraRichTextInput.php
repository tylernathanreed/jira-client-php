<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraRichTextInput extends Dto
{
    public function __construct(
        /** @var array<string,mixed> */
        public ?array $adfValue = null,
    ) {
    }
}
