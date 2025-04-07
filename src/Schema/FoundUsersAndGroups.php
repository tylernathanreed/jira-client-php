<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** List of users and groups found in a search. */
final readonly class FoundUsersAndGroups extends Dto
{
    public function __construct(
        public ?FoundGroups $groups = null,

        public ?FoundUsers $users = null,
    ) {
    }
}
