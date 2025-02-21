<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a project role. */
final readonly class ProjectRoleDetails extends Dto
{
    public function __construct(
        /** Whether this role is the admin role for the project. */
        public ?bool $admin = null,

        /** Whether this role is the default role for the project. */
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
