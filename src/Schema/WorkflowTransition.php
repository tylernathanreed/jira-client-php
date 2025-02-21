<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A workflow transition. */
final readonly class WorkflowTransition extends Dto
{
    public function __construct(
        /** The transition ID. */
        public int $id,

        /** The transition name. */
        public string $name,
    ) {
    }
}
