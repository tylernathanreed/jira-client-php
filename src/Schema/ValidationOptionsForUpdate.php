<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * The level of validation to return from the API.
 * If no values are provided, the default would return `WARNING` and `ERROR` level validation results.
 */
final readonly class ValidationOptionsForUpdate extends Dto
{
    public function __construct(
        public ?array $levels = null,
    ) {
    }
}
