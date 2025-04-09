<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The layout of the workflow status. */
final readonly class WorkflowStatusLayoutPayload extends Dto
{
    public function __construct(
        /**
         * The x coordinate of the status.
         * 
         * @example 1
         */
        public ?float $x = null,

        /**
         * The y coordinate of the status.
         * 
         * @example 2
         */
        public ?float $y = null,
    ) {
    }
}
