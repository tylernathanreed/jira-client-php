<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// RoleActorDoc
final readonly class RoleActor extends Dto
{
    public function __construct(
        public ?ProjectRoleGroup $actorGroup = null,

        public ?ProjectRoleUser $actorUser = null,

        /** The avatar of the role actor. */
        public ?string $avatarUrl = null,

        /**
         * The display name of the role actor.
         * For users, depending on the user’s privacy setting, this may return an alternative value for the user's name.
         */
        public ?string $displayName = null,

        /** The ID of the role actor. */
        public ?int $id = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $name = null,

        /**
         * The type of role actor.
         * 
         * @var 'atlassian-group-role-actor'|'atlassian-user-role-actor'|null
         */
        public ?string $type = null,
    ) {
    }
}
