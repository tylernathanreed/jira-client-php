<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about system and custom avatars. */
final readonly class Avatars extends Dto
{
    public function __construct(
        /**
         * Custom avatars list.
         * 
         * @var ?list<Avatar>
         */
        public ?array $custom = null,

        /**
         * System avatars list.
         * 
         * @var ?list<Avatar>
         */
        public ?array $system = null,
    ) {
    }
}
