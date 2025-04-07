<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The projects using this status. */
final readonly class StatusProjectUsageDTO extends Dto
{
    public function __construct(
        public ?StatusProjectUsagePage $projects = null,

        /** The status ID. */
        public ?string $statusId = null,
    ) {
    }
}
