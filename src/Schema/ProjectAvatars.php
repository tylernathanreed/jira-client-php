<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectAvatarsDoc
final readonly class ProjectAvatars extends Dto
{
    public function __construct(
        /**
         * List of avatars added to Jira.
         * These avatars may be deleted.
         * 
         * @var ?list<Avatar>
         */
        public ?array $custom = null,

        /**
         * List of avatars included with Jira.
         * These avatars cannot be deleted.
         * 
         * @var ?list<Avatar>
         */
        public ?array $system = null,
    ) {
    }
}
