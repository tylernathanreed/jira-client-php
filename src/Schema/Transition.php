<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// TransitionDoc
final readonly class Transition extends Dto
{
    public function __construct(
        /** The description of the transition. */
        public string $description,

        /**
         * The statuses the transition can start from.
         * 
         * @var list<string>
         */
        public array $from,

        /** The ID of the transition. */
        public string $id,

        /** The name of the transition. */
        public string $name,

        /** The status the transition goes to. */
        public string $to,

        /**
         * The type of the transition.
         * 
         * @var 'global'|'initial'|'directed'
         */
        public string $type,

        /** The properties of the transition. */
        public ?object $properties = null,

        public ?WorkflowRules $rules = null,

        public ?TransitionScreenDetails $screen = null,
    ) {
    }
}
