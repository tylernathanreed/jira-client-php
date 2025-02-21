<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetPermissionResponse extends Dto
{
    public function __construct(
        /** The permission holder. */
        public GetPermissionHolderResponse $holder,

        /**
         * The permission type.
         * This is "View" or "Edit".
         * 
         * @var 'View'|'Edit'
         */
        public string $type,
    ) {
    }
}
