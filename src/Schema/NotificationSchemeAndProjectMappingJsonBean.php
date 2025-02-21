<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class NotificationSchemeAndProjectMappingJsonBean extends Dto
{
    public function __construct(
        public ?string $notificationSchemeId = null,

        public ?string $projectId = null,
    ) {
    }
}
