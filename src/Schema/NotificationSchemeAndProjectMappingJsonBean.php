<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class NotificationSchemeAndProjectMappingJsonBean extends Dto
{
    public function __construct(
        public ?string $notificationSchemeId = null,

        public ?string $projectId = null,
    ) {
    }
}
