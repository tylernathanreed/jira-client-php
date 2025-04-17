<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of system avatars. */
final class SystemAvatars extends Dto
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
