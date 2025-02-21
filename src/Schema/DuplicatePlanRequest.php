<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class DuplicatePlanRequest extends Dto
{
    public function __construct(
        /** The plan name. */
        public string $name,
    ) {
    }
}
