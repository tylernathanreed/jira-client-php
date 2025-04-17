<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class WorkManagementNavigationInfo extends Dto
{
    public function __construct(
        public ?string $boardName = null,
    ) {
    }
}
