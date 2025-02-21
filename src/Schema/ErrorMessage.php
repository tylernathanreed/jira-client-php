<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ErrorMessageDoc
final readonly class ErrorMessage extends Dto
{
    public function __construct(
        public ?string $message = null,
    ) {
    }
}
