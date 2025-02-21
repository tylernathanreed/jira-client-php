<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * The transitions of the workflow.
 * Note that a transition can have either the deprecated `to`/`from` fields or the `toStatusReference`/`links` fields, but never both nor a combination.
 */
final readonly class WorkflowTransitions extends Dto
{
    public function __construct(
        /**
         * The post-functions of the transition.
         * 
         * @var ?list<WorkflowRuleConfiguration>
         */
        public ?array $actions = null,

        public ?ConditionGroupConfiguration $conditions = null,

        /** The custom event ID of the transition. */
        public ?string $customIssueEventId = null,

        /** The description of the transition. */
        public ?string $description = null,

        /**
         * The statuses and ports that the transition can start from.
         * This field is deprecated - use `toStatusReference`/`links` instead.
         * 
         * @var ?list<WorkflowStatusAndPort>
         */
        public ?array $from = null,

        /** The ID of the transition. */
        public ?string $id = null,

        /**
         * The statuses the transition can start from, and the mapping of ports between the statuses.
         * 
         * @var ?list<WorkflowTransitionLinks>
         */
        public ?array $links = null,

        /** The name of the transition. */
        public ?string $name = null,

        /**
         * The properties of the transition.
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,

        public ?WorkflowStatusAndPort $to = null,

        /** The status the transition goes to. */
        public ?string $toStatusReference = null,

        public ?WorkflowRuleConfiguration $transitionScreen = null,

        /**
         * The triggers of the transition.
         * 
         * @var ?list<WorkflowTrigger>
         */
        public ?array $triggers = null,

        /**
         * The transition type.
         * 
         * @var 'INITIAL'|'GLOBAL'|'DIRECTED'|null
         */
        public ?string $type = null,

        /**
         * The validators of the transition.
         * 
         * @var ?list<WorkflowRuleConfiguration>
         */
        public ?array $validators = null,
    ) {
    }
}
