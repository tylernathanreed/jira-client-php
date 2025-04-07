<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The project. */
final readonly class StatusProjectUsage extends Dto
{
    public function __construct(
        /** The project ID. */
        public ?string $id = null,
    ) {
    }
}
