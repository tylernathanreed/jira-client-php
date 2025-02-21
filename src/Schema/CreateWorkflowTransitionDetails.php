<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of a workflow transition. */
final readonly class CreateWorkflowTransitionDetails extends Dto
{
    public function __construct(
        /**
         * The name of the transition.
         * The maximum length is 60 characters.
         */
        public string $name,

        /** The status the transition goes to. */
        public string $to,

        /**
         * The type of the transition.
         * 
         * @var 'global'|'initial'|'directed'
         */
        public string $type,

        /**
         * The description of the transition.
         * The maximum length is 1000 characters.
         */
        public ?string $description = null,

        /**
         * The statuses the transition can start from.
         * 
         * @var ?list<string>
         */
        public ?array $from = null,

        /**
         * The properties of the transition.
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,

        /** The rules of the transition. */
        public ?CreateWorkflowTransitionRulesDetails $rules = null,

        /** The screen of the transition. */
        public ?CreateWorkflowTransitionScreenDetails $screen = null,
    ) {
    }
}
