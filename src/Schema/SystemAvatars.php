<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of system avatars. */
final readonly class SystemAvatars extends Dto
{
    public function __construct(
        /**
         * A list of avatar details.
         * 
         * @var ?list<Avatar>
         */
        public ?array $system = null,
    ) {
    }
}
