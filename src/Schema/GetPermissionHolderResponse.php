<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetPermissionHolderResponse extends Dto
{
    public function __construct(
        /**
         * The permission holder type.
         * This is "Group" or "AccountId".
         * 
         * @var 'Group'|'AccountId'
         */
        public string $type,

        /**
         * The permission holder value.
         * This is a group name if the type is "Group" or an account ID if the type is "AccountId".
         */
        public string $value,
    ) {
    }
}
