<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class JiraDurationField extends Dto
{
    public function __construct(
        public string $originalEstimateField,
    ) {
    }
}
