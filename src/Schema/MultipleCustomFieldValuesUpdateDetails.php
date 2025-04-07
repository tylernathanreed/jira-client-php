<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** List of updates for a custom fields. */
final readonly class MultipleCustomFieldValuesUpdateDetails extends Dto
{
    public function __construct(
        /** @var ?list<MultipleCustomFieldValuesUpdate> */
        public ?array $updates = null,
    ) {
    }
}
