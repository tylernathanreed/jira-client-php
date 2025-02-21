<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueSecurityLevelMemberDoc
final readonly class IssueSecurityLevelMember extends Dto
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
        public int $id,

        /** The ID of the issue security level. */
        public int $issueSecurityLevelId,
    ) {
    }
}
