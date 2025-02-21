<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SoftwareNavigationInfoDoc
final readonly class SoftwareNavigationInfo extends Dto
{
    public function __construct(
        public ?int $boardId = null,

        public ?string $boardName = null,

        public ?bool $simpleBoard = null,

        public ?int $totalBoardsInProject = null,
    ) {
    }
}
