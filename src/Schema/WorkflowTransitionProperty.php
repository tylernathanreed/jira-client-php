<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the server Jira is running on. */
final readonly class WorkflowTransitionProperty extends Dto
{
    public function __construct(
        /** The value of the transition property. */
        public string $value,

        /** The ID of the transition property. */
        public ?string $id = null,

        /**
         * The key of the transition property.
         * Also known as the name of the transition property.
         */
        public ?string $key = null,
    ) {
    }
}
