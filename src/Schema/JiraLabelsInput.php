<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraLabelsInput extends Dto
{
    public function __construct(
        public string $name,
    ) {
    }
}
