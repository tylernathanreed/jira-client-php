<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IdBeanDoc
final readonly class IdBean extends Dto
{
    public function __construct(
        /**
         * The ID of the permission scheme to associate with the project.
         * Use the "Get all permission schemes" resource to get a list of permission scheme IDs.
         */
        public int $id,
    ) {
    }
}
