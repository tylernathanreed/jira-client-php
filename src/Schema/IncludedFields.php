<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IncludedFields extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $actuallyIncluded = null,

        /** @var ?list<string> */
        public ?array $excluded = null,

        /** @var ?list<string> */
        public ?array $included = null,
    ) {
    }
}
