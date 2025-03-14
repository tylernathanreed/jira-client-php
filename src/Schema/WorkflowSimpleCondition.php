<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * A workflow transition rule condition.
 * This object returns `nodeType` as `simple`.
 */
final readonly class WorkflowSimpleCondition extends Dto
{
    public function __construct(
        public string $nodeType,

        /** The type of the transition rule. */
        public string $type,

        /**
         * EXPERIMENTAL.
         * The configuration of the transition rule.
         * 
         * @var array<string,mixed>
         */
        public ?array $configuration = null,
    ) {
    }
}
