<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** A workflow transition rule. */
final class WorkflowTransitionRule extends Dto
{
    public function __construct(
        /** The type of the transition rule. */
        public string $type,

        /**
         * EXPERIMENTAL.
         * The configuration of the transition rule.
         */
        public mixed $configuration = null,
    ) {
    }
}
