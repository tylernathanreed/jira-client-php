<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraSelectedOptionField extends Dto
{
    public function __construct(
        public ?int $optionId = null,
    ) {
    }
}
