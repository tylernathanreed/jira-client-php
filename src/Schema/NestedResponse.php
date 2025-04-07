<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class NestedResponse extends Dto
{
    public function __construct(
        public ?ErrorCollection $errorCollection = null,

        public ?int $status = null,

        public ?WarningCollection $warningCollection = null,
    ) {
    }
}
