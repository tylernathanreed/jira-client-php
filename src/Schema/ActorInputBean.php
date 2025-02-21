<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ActorInputBeanDoc
final readonly class ActorInputBean extends Dto
{
    public function __construct(
        /**
         * The name of the group to add as a default actor.
         * This parameter cannot be used with the `groupId` parameter.
         * As a group's name can change,use of `groupId` is recommended.
         * This parameter accepts a comma-separated list.
         * For example, `"group":["project-admin", "jira-developers"]`.
         * 
         * @var ?list<string>
         */
        public ?array $group = null,

        /**
         * The ID of the group to add as a default actor.
         * This parameter cannot be used with the `group` parameter This parameter accepts a comma-separated list.
         * For example, `"groupId":["77f6ab39-e755-4570-a6ae-2d7a8df0bcb8", "0c011f85-69ed-49c4-a801-3b18d0f771bc"]`.
         * 
         * @var ?list<string>
         */
        public ?array $groupId = null,

        /**
         * The account IDs of the users to add as default actors.
         * This parameter accepts a comma-separated list.
         * For example, `"user":["5b10a2844c20165700ede21g", "5b109f2e9729b51b54dc274d"]`.
         * 
         * @var ?list<string>
         */
        public ?array $user = null,
    ) {
    }
}
