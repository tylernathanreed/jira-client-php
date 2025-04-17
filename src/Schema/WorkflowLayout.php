<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The starting point for the statuses in the workflow. */
final class WorkflowLayout extends Dto
{
    public function __construct(
        /** The x axis location. */
        public ?float $x = null,

        /** The y axis location. */
        public ?float $y = null,
    ) {
    }
}
