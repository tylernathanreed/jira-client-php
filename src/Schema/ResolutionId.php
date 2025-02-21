<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ResolutionIdDoc
final readonly class ResolutionId extends Dto
{
    public function __construct(
        /** The ID of the issue resolution. */
        public string $id,
    ) {
    }
}
