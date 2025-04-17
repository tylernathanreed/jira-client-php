<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Properties that identify a published workflow. */
final class PublishedWorkflowId extends Dto
{
    public function __construct(
        /** The name of the workflow. */
        public string $name,

        /** The entity ID of the workflow. */
        public ?string $entityId = null,
    ) {
    }
}
