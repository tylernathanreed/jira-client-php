<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class RolesCapabilityPayload extends Dto
{
    public function __construct(
        /**
         * A map of role PCRI (can be ID or REF) to a list of user or group PCRI IDs to associate with the role and project.
         * 
         * @var array<string,ProjectCreateResourceIdentifier>
         */
        public ?array $roleToProjectActors = null,

        /**
         * The list of roles to create.
         * 
         * @var ?list<RolePayload>
         */
        public ?array $roles = null,
    ) {
    }
}
