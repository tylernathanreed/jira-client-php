<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of watchers on an issue. */
final readonly class Watchers extends Dto
{
    public function __construct(
        /** Whether the calling user is watching this issue. */
        public ?bool $isWatching = null,

        /** The URL of these issue watcher details. */
        public ?string $self = null,

        /** The number of users watching this issue. */
        public ?int $watchCount = null,

        /**
         * Details of the users watching this issue.
         * 
         * @var ?list<UserDetails>
         */
        public ?array $watchers = null,
    ) {
    }
}
