<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SecurityLevelMemberDoc
final readonly class SecurityLevelMember extends Dto
{
    public function __construct(
        /**
         * The user or group being granted the permission.
         * It consists of a `type` and a type-dependent `parameter`.
         * See "Holder object" in *Get all permission schemes* for more information.
         * 
         * @link ../api-group-permission-schemes/#holder-object
         */
        public PermissionHolder $holder,

        /** The ID of the issue security level member. */
        public string $id,

        /** The ID of the issue security level. */
        public string $issueSecurityLevelId,

        /** The ID of the issue security scheme. */
        public string $issueSecuritySchemeId,

        public ?bool $managed = null,
    ) {
    }
}
