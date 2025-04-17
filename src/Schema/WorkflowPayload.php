<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating workflow, see https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/\#api-rest-api-3-workflows-create-post */
final class WorkflowPayload extends Dto
{
    public function __construct(
        /**
         * The description of the workflow
         * 
         * @example 'a software workflow'
         */
        public ?string $description = null,

        public ?WorkflowStatusLayoutPayload $loopedTransitionContainerLayout = null,

        /**
         * The name of the workflow
         * 
         * @example 'Software Simplified Workflow'
         */
        public ?string $name = null,

        /**
         * The strategy to use if there is a conflict with another workflow
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = 'NEW',

        public ?ProjectCreateResourceIdentifier $pcri = null,

        public ?WorkflowStatusLayoutPayload $startPointLayout = null,

        /**
         * The statuses to be used in the workflow
         * 
         * @var ?list<WorkflowStatusPayload>
         */
        public ?array $statuses = null,

        /**
         * The transitions for the workflow
         * 
         * @var ?list<TransitionPayload>
         */
        public ?array $transitions = null,
    ) {
    }
}
