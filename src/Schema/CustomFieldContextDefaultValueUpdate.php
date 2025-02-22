<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Default values to update. */
final readonly class CustomFieldContextDefaultValueUpdate extends Dto
{
    public function __construct(
        /** @var ?list<CustomFieldContextDefaultValue> */
        public ?array $defaultValues = null,
    ) {
    }
}
