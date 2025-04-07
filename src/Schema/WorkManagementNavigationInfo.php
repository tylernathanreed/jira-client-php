<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class WorkManagementNavigationInfo extends Dto
{
    public function __construct(
        public ?string $boardName = null,
    ) {
    }
}
