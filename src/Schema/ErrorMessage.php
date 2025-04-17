<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class ErrorMessage extends Dto
{
    public function __construct(
        public ?string $message = null,
    ) {
    }
}
