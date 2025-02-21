<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// MoveFieldBeanDoc
final readonly class MoveFieldBean extends Dto
{
    public function __construct(
        /**
         * The ID of the screen tab field after which to place the moved screen tab field.
         * Required if `position` isn't provided.
         */
        public ?string $after = null,

        /**
         * The named position to which the screen tab field should be moved.
         * Required if `after` isn't provided.
         * 
         * @var 'Earlier'|'Later'|'First'|'Last'|null
         */
        public ?string $position = null,
    ) {
    }
}
