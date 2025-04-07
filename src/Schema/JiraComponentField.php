<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraComponentField extends Dto
{
    public function __construct(
        public int $componentId,
    ) {
    }
}
