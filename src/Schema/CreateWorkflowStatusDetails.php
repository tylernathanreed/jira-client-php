<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateWorkflowStatusDetailsDoc
final readonly class CreateWorkflowStatusDetails extends Dto
{
    public function __construct(
        /** The ID of the status. */
        public string $id,

        /**
         * The properties of the status.
         * 
         * @var array<string,string>
         */
        public ?array $properties = null,
    ) {
    }
}
