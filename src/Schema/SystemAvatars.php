<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SystemAvatarsDoc
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
