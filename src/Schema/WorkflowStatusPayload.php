<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The statuses to be used in the workflow */
final class WorkflowStatusPayload extends Dto
{
    public function __construct(
        public ?WorkflowStatusLayoutPayload $layout = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The properties of the workflow status.
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,
    ) {
    }
}
