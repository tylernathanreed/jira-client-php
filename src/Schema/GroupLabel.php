<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A group label. */
final readonly class GroupLabel extends Dto
{
    public function __construct(
        /** The group label name. */
        public ?string $text = null,

        /** The title of the group label. */
        public ?string $title = null,

        /**
         * The type of the group label.
         * 
         * @var 'ADMIN'|'SINGLE'|'MULTIPLE'|null
         */
        public ?string $type = null,
    ) {
    }
}
