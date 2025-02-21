<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// MultipleCustomFieldValuesUpdateDetailsDoc
final readonly class MultipleCustomFieldValuesUpdateDetails extends Dto
{
    public function __construct(
        public ?array $updates = null,
    ) {
    }
}
