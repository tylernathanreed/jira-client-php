<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ActorsMap extends Dto
{
    public function __construct(
        /**
         * The name of the group to add.
         * This parameter cannot be used with the `groupId` parameter.
         * As a group's name can change, use of `groupId` is recommended.
         *
         * @var list<string>
         */
        public array $group = [],

        /**
         * The ID of the group to add.
         * This parameter cannot be used with the `group` parameter.
         *
         * @var list<string>
         */
        public array $groupId = [],

        /**
         * The user account ID of the user to add.
         *
         * @var list<string>
         */
        public array $user = [],
    ) {
    }
}
