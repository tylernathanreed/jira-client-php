<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The worflow. */
final class StatusWorkflowUsageWorkflow extends Dto
{
    public function __construct(
        /** The workflow ID. */
        public ?string $id = null,
    ) {
    }
}
