<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ValidationOptionsForCreateDoc
final readonly class ValidationOptionsForCreate extends Dto
{
    public function __construct(
        public ?array $levels = null,
    ) {
    }
}
