<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueUpdateDoc
final readonly class CustomFieldContextDefaultValueUpdate extends Dto
{
    public function __construct(
        public ?array $defaultValues = null,
    ) {
    }
}
