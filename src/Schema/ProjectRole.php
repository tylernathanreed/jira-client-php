<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the roles in a project. */
final readonly class ProjectRole extends Dto
{
    public function __construct(
        /**
         * The list of users who act in this role.
         * 
         * @var ?list<RoleActor>
         */
        public ?array $actors = null,

        /** Whether this role is the admin role for the project. */
        public ?bool $admin = null,

        /** Whether the calling user is part of this role. */
        public ?bool $currentUserRole = null,

        /** Whether this role is the default role for the project */
        public ?bool $default = null,

        /** The description of the project role. */
        public ?string $description = null,

        /** The ID of the project role. */
        public ?int $id = null,

        /** The name of the project role. */
        public ?string $name = null,

        /** Whether the roles are configurable for this project. */
        public ?bool $roleConfigurable = null,

        /**
         * The scope of the role.
         * Indicated for roles associated with "next-gen projects".
         * 
         * @link https://confluence.atlassian.com/x/loMyO
         */
        public ?Scope $scope = null,

        /** The URL the project role details. */
        public ?string $self = null,

        /** The translated name of the project role. */
        public ?string $translatedName = null,
    ) {
    }
}
