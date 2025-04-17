<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class NonWorkingDay extends Dto
{
    public function __construct(
        public ?int $id = null,

        public ?string $iso8601Date = null,
    ) {
    }
}
