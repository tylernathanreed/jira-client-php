<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a transition in a workflow.
 * Can be DIRECTED, GLOBAL, SELF-LOOPED, GLOBAL LOOPED
 */
final class TransitionPayload extends Dto
{
    public function __construct(
        /**
         * The actions that are performed when the transition is made
         * 
         * @var ?list<RulePayload>
         */
        public ?array $actions = null,

        public ?ConditionGroupPayload $conditions = null,

        /**
         * Mechanism in Jira for triggering certain actions, like notifications, automations, etc.
         * Unless a custom notification scheme is configure, it's better not to provide any value here
         */
        public ?string $customIssueEventId = null,

        /** The description of the transition */
        public ?string $description = null,

        /**
         * The statuses that the transition can be made from
         * 
         * @var ?list<FromLayoutPayload>
         */
        public ?array $from = null,

        /** The id of the transition */
        public ?int $id = null,

        /** The name of the transition */
        public ?string $name = null,

        /**
         * The properties of the transition
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,

        public ?ToLayoutPayload $to = null,

        public ?RulePayload $transitionScreen = null,

        /**
         * The triggers that are performed when the transition is made
         * 
         * @var ?list<RulePayload>
         */
        public ?array $triggers = null,

        /**
         * The type of the transition
         * 
         * @var 'global'|'initial'|'directed'|null
         */
        public ?string $type = null,

        /**
         * The validators that are performed when the transition is made
         * 
         * @var ?list<RulePayload>
         */
        public ?array $validators = null,
    ) {
    }
}
