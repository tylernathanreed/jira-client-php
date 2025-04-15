<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The project. */
final readonly class ProjectUsage extends Dto
{
    public function __construct(
        /** The project ID. */
        public ?string $id = null,
    ) {
    }
}
