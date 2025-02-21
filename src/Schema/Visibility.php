<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VisibilityDoc
final readonly class Visibility extends Dto
{
    public function __construct(
        /** The ID of the group or the name of the role that visibility of this item is restricted to. */
        public ?string $identifier = null,

        /**
         * Whether visibility of this item is restricted to a group or role.
         * 
         * @var 'group'|'role'|null
         */
        public ?string $type = null,

        /**
         * The name of the group or role that visibility of this item is restricted to.
         * Please note that the name of a group is mutable, to reliably identify a group use `identifier`.
         */
        public ?string $value = null,
    ) {
    }
}
