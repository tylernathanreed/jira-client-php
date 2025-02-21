<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraComponentField extends Dto
{
    public function __construct(
        public int $componentId,
    ) {
    }
}
