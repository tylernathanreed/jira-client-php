<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class ServiceManagementNavigationInfo extends Dto
{
    public function __construct(
        public ?string $queueCategory = null,

        public ?int $queueId = null,

        public ?string $queueName = null,
    ) {
    }
}
