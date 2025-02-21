<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PublishDraftWorkflowSchemeDoc
final readonly class PublishDraftWorkflowScheme extends Dto
{
    public function __construct(
        /**
         * Mappings of statuses to new statuses for issue types.
         * 
         * @var ?list<StatusMapping>
         */
        public ?array $statusMappings = null,
    ) {
    }
}
