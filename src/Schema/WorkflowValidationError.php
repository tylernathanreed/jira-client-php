<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowValidationErrorDoc
final readonly class WorkflowValidationError extends Dto
{
    public function __construct(
        /** An error code. */
        public ?string $code = null,

        public ?WorkflowElementReference $elementReference = null,

        /**
         * The validation error level.
         * 
         * @var 'WARNING'|'ERROR'|null
         */
        public ?string $level = null,

        /** An error message. */
        public ?string $message = null,

        /**
         * The type of element the error or warning references.
         * 
         * @var 'RULE'|'STATUS'|'STATUS_LAYOUT'|'STATUS_PROPERTY'|'WORKFLOW'|'TRANSITION'|'TRANSITION_PROPERTY'|'SCOPE'|'STATUS_MAPPING'|'TRIGGER'|null
         */
        public ?string $type = null,
    ) {
    }
}
