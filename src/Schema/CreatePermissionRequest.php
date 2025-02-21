<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class CreatePermissionRequest extends Dto
{
    public function __construct(
        /** The permission holder. */
        public CreatePermissionHolderRequest $holder,

        /**
         * The permission type.
         * This must be "View" or "Edit".
         * 
         * @var 'View'|'Edit'
         */
        public string $type,
    ) {
    }
}
