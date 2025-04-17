<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class ExpandPrioritySchemePage extends Dto
{
    public function __construct(
        public ?int $maxResults = null,

        public ?int $startAt = null,

        public ?int $total = null,
    ) {
    }
}
