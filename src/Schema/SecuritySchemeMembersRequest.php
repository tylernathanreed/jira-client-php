<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of issue security scheme level new members. */
final readonly class SecuritySchemeMembersRequest extends Dto
{
    public function __construct(
        /**
         * The list of level members which should be added to the issue security scheme level.
         * 
         * @var ?list<SecuritySchemeLevelMemberBean>
         */
        public ?array $members = null,
    ) {
    }
}
