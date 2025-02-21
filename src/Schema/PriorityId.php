<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID of an issue priority. */
final readonly class PriorityId extends Dto
{
    public function __construct(
        /** The ID of the issue priority. */
        public string $id,
    ) {
    }
}
