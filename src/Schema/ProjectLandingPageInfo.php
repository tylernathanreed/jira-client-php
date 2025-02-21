<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectLandingPageInfoDoc
final readonly class ProjectLandingPageInfo extends Dto
{
    public function __construct(
        public ?array $attributes = null,

        public ?int $boardId = null,

        public ?string $boardName = null,

        public ?string $projectKey = null,

        public ?string $projectType = null,

        public ?string $queueCategory = null,

        public ?int $queueId = null,

        public ?string $queueName = null,

        public ?bool $simpleBoard = null,

        public ?bool $simplified = null,

        public ?string $url = null,
    ) {
    }
}
