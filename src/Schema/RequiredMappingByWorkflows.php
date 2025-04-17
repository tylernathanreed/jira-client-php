<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The list of required status mappings by workflow. */
final class RequiredMappingByWorkflows extends Dto
{
    public function __construct(
        /** The ID of the source workflow. */
        public ?string $sourceWorkflowId = null,

        /**
         * The status IDs requiring mapping.
         * 
         * @var ?list<string>
         */
        public ?array $statusIds = null,

        /** The ID of the target workflow. */
        public ?string $targetWorkflowId = null,
    ) {
    }
}
