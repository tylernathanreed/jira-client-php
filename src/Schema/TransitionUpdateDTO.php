<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// TransitionUpdateDTODoc
final readonly class TransitionUpdateDTO extends Dto
{
    public function __construct(
        /** The ID of the transition. */
        public string $id,

        /** The name of the transition. */
        public string $name,

        /**
         * The transition type.
         * 
         * @var 'INITIAL'|'GLOBAL'|'DIRECTED'
         */
        public string $type,

        /**
         * The post-functions of the transition.
         * 
         * @var ?list<WorkflowRuleConfiguration>
         */
        public ?array $actions = null,

        public ?ConditionGroupUpdate $conditions = null,

        /** The custom event ID of the transition. */
        public ?string $customIssueEventId = null,

        /** The description of the transition. */
        public ?string $description = null,

        /**
         * The statuses and ports that the transition can start from.
         * This field is deprecated - use `toStatusReference`/`links` instead.
         * 
         * @var ?list<StatusReferenceAndPort>
         */
        public ?array $from = null,

        /**
         * The statuses the transition can start from, and the mapping of ports between the statuses.
         * 
         * @var ?list<WorkflowTransitionLinks>
         */
        public ?array $links = null,

        /**
         * The properties of the transition.
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,

        public ?StatusReferenceAndPort $to = null,

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
         * The validators of the transition.
         * 
         * @var ?list<WorkflowRuleConfiguration>
         */
        public ?array $validators = null,
    ) {
    }
}
