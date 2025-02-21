<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Default values to update. */
final readonly class CustomFieldContextDefaultValueUpdate extends Dto
{
    public function __construct(
        public ?array $defaultValues = null,
    ) {
    }
}
