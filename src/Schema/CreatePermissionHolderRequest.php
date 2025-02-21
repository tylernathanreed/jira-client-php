<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreatePermissionHolderRequestDoc
final readonly class CreatePermissionHolderRequest extends Dto
{
    public function __construct(
        /**
         * The permission holder type.
         * This must be "Group" or "AccountId".
         * 
         * @var 'Group'|'AccountId'
         */
        public string $type,

        /**
         * The permission holder value.
         * This must be a group name if the type is "Group" or an account ID if the type is "AccountId".
         */
        public string $value,
    ) {
    }
}
