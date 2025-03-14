<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class InputStreamSource extends Dto
{
    public function __construct(
        /** @var array<string,mixed> */
        public ?array $inputStream = null,
    ) {
    }
}
