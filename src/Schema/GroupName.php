<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a group. */
final readonly class GroupName extends Dto
{
    public function __construct(
        /**
         * The ID of the group, which uniquely identifies the group across all Atlassian products.
         * For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
         */
        public ?string $groupId = null,

        /** The name of group. */
        public ?string $name = null,

        /** The URL for these group details. */
        public ?string $self = null,
    ) {
    }
}
