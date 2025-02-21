<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowStatusLayoutDoc
final readonly class WorkflowStatusLayout extends Dto
{
    public function __construct(
        /** The x axis location. */
        public ?float $x = null,

        /** The y axis location. */
        public ?float $y = null,
    ) {
    }
}
