<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectRoleGroupDoc
final readonly class ProjectRoleGroup extends Dto
{
    public function __construct(
        /** The display name of the group. */
        public ?string $displayName = null,

        /** The ID of the group. */
        public ?string $groupId = null,

        /**
         * The name of the group.
         * As a group's name can change, use of `groupId` is recommended to identify the group.
         */
        public ?string $name = null,
    ) {
    }
}
