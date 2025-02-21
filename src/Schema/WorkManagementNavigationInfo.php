<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkManagementNavigationInfoDoc
final readonly class WorkManagementNavigationInfo extends Dto
{
    public function __construct(
        public ?string $boardName = null,
    ) {
    }
}
