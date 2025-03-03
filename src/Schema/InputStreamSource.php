<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class InputStreamSource extends Dto
{
    public function __construct(
        public ?object $inputStream = null,
    ) {
    }
}
