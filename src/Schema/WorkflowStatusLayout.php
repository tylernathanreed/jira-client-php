<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The x and y location of the status in the workflow. */
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
