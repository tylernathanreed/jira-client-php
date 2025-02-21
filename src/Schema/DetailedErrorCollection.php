<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class DetailedErrorCollection extends Dto
{
    public function __construct(
        /** Map of objects representing additional details for an error */
        public ?object $details = null,

        /**
         * The list of error messages produced by this operation.
         * For example, "input parameter 'key' must be provided"
         * 
         * @var ?list<string>
         */
        public ?array $errorMessages = null,

        /**
         * The list of errors by parameter returned by the operation.
         * For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters."
         * 
         * @var array<string,string>
         */
        public ?array $errors = null,
    ) {
    }
}
