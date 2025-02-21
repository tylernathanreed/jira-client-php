<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of available trigger types. */
final readonly class AvailableWorkflowTriggerTypes extends Dto
{
    public function __construct(
        /** The description of the trigger rule. */
        public ?string $description = null,

        /** The name of the trigger rule. */
        public ?string $name = null,

        /** The type identifier of trigger rule. */
        public ?string $type = null,
    ) {
    }
}
