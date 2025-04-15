<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of updates for a custom fields. */
final readonly class MultipleCustomFieldValuesUpdateDetails extends Dto
{
    public function __construct(
        /** @var ?list<MultipleCustomFieldValuesUpdate> */
        public ?array $updates = null,
    ) {
    }
}
