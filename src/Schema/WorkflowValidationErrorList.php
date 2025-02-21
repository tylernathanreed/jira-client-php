<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowValidationErrorListDoc
final readonly class WorkflowValidationErrorList extends Dto
{
    public function __construct(
        /**
         * The list of validation errors.
         * 
         * @var ?list<WorkflowValidationError>
         */
        public ?array $errors = null,
    ) {
    }
}
