<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PermissionGrantsDoc
final readonly class PermissionGrants extends Dto
{
    public function __construct(
        /** Expand options that include additional permission grant details in the response. */
        public ?string $expand = null,

        /**
         * Permission grants list.
         * 
         * @var ?list<PermissionGrant>
         */
        public ?array $permissions = null,
    ) {
    }
}
