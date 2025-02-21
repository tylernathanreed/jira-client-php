<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ValidationOptionsForUpdateDoc
final readonly class ValidationOptionsForUpdate extends Dto
{
    public function __construct(
        public ?array $levels = null,
    ) {
    }
}
