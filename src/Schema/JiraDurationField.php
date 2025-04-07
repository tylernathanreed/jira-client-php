<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraDurationField extends Dto
{
    public function __construct(
        public string $originalEstimateField,
    ) {
    }
}
