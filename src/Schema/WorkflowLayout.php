<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowLayoutDoc
final readonly class WorkflowLayout extends Dto
{
    public function __construct(
        /** The x axis location. */
        public ?float $x = null,

        /** The y axis location. */
        public ?float $y = null,
    ) {
    }
}
