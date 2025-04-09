<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** List of permission grants */
final readonly class PermissionGrantDTO extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $applicationAccess = null,

        /** @var ?list<ProjectCreateResourceIdentifier> */
        public ?array $groupCustomFields = null,

        /** @var ?list<ProjectCreateResourceIdentifier> */
        public ?array $groups = null,

        /** @var ?list<string> */
        public ?array $permissionKeys = null,

        /** @var ?list<ProjectCreateResourceIdentifier> */
        public ?array $projectRoles = null,

        /** @var ?list<string> */
        public ?array $specialGrants = null,

        /** @var ?list<ProjectCreateResourceIdentifier> */
        public ?array $userCustomFields = null,

        /** @var ?list<ProjectCreateResourceIdentifier> */
        public ?array $users = null,
    ) {
    }
}
