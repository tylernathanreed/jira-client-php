<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraDurationFieldDoc
final readonly class JiraDurationField extends Dto
{
    public function __construct(
        public string $originalEstimateField,
    ) {
    }
}
