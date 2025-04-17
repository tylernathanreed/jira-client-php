<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraSelectedOptionField extends Dto
{
    public function __construct(
        public ?int $optionId = null,
    ) {
    }
}
