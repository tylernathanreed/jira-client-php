<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraLabelsInput extends Dto
{
    public function __construct(
        public string $name,
    ) {
    }
}
