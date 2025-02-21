<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FoundUsersAndGroupsDoc
final readonly class FoundUsersAndGroups extends Dto
{
    public function __construct(
        public ?FoundGroups $groups = null,

        public ?FoundUsers $users = null,
    ) {
    }
}
