<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PriorityIdDoc
final readonly class PriorityId extends Dto
{
    public function __construct(
        /** The ID of the issue priority. */
        public string $id,
    ) {
    }
}
