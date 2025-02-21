<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VersionMoveBeanDoc
final readonly class VersionMoveBean extends Dto
{
    public function __construct(
        /**
         * The URL (self link) of the version after which to place the moved version.
         * Cannot be used with `position`.
         */
        public ?string $after = null,

        /**
         * An absolute position in which to place the moved version.
         * Cannot be used with `after`.
         * 
         * @var 'Earlier'|'Later'|'First'|'Last'|null
         */
        public ?string $position = null,
    ) {
    }
}
