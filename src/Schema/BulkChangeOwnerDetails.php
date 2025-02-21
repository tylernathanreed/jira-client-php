<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkChangeOwnerDetailsDoc
final readonly class BulkChangeOwnerDetails extends Dto
{
    public function __construct(
        /** Whether the name is fixed automatically if it's duplicated after changing owner. */
        public bool $autofixName,

        /** The account id of the new owner. */
        public string $newOwner,
    ) {
    }
}
