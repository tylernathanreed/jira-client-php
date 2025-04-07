<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The worflow. */
final readonly class StatusWorkflowUsageWorkflow extends Dto
{
    public function __construct(
        /** The workflow ID. */
        public ?string $id = null,
    ) {
    }
}
