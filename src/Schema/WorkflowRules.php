<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A collection of transition rules. */
final readonly class WorkflowRules extends Dto
{
    public function __construct(
        public ?WorkflowCondition $conditionsTree = null,

        /**
         * The workflow post functions.
         * 
         * @var ?list<WorkflowTransitionRule>
         */
        public ?array $postFunctions = null,

        /**
         * The workflow validators.
         * 
         * @var ?list<WorkflowTransitionRule>
         */
        public ?array $validators = null,
    ) {
    }
}
