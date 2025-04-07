<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

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
