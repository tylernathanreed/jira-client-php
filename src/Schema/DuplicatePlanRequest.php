<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DuplicatePlanRequestDoc
final readonly class DuplicatePlanRequest extends Dto
{
    public function __construct(
        /** The plan name. */
        public string $name,
    ) {
    }
}
