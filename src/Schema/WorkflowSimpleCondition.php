<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSimpleConditionDoc
final readonly class WorkflowSimpleCondition extends Dto
{
    public function __construct(
        public string $nodeType,

        /** The type of the transition rule. */
        public string $type,

        /**
         * EXPERIMENTAL.
         * The configuration of the transition rule.
         */
        public ?object $configuration = null,
    ) {
    }
}
