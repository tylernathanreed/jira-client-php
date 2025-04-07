<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class ErrorMessage extends Dto
{
    public function __construct(
        public ?string $message = null,
    ) {
    }
}
