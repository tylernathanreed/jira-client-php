<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IncludedFields extends Dto
{
    public function __construct(
        public ?array $actuallyIncluded = null,

        public ?array $excluded = null,

        public ?array $included = null,
    ) {
    }
}
