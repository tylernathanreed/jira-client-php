<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A workflow transition condition. */
final readonly class CreateWorkflowCondition extends Dto
{
    public function __construct(
        /**
         * The list of workflow conditions.
         * 
         * @var ?list<CreateWorkflowCondition>
         */
        public ?array $conditions = null,

        /**
         * EXPERIMENTAL.
         * The configuration of the transition rule.
         * 
         * @var array<string,mixed>
         */
        public ?array $configuration = null,

        /**
         * The compound condition operator.
         * 
         * @var 'AND'|'OR'|null
         */
        public ?string $operator = null,

        /** The type of the transition rule. */
        public ?string $type = null,
    ) {
    }
}
