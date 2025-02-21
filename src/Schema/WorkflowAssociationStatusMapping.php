<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of status mappings. */
final readonly class WorkflowAssociationStatusMapping extends Dto
{
    public function __construct(
        /** The ID of the status in the new workflow. */
        public string $newStatusId,

        /** The ID of the status in the old workflow that isn't present in the new workflow. */
        public string $oldStatusId,
    ) {
    }
}
