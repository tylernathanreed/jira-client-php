<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ServiceManagementNavigationInfo extends Dto
{
    public function __construct(
        public ?string $queueCategory = null,

        public ?int $queueId = null,

        public ?string $queueName = null,
    ) {
    }
}
