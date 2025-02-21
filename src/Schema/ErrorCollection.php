<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ErrorCollectionDoc
final readonly class ErrorCollection extends Dto
{
    public function __construct(
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

        public ?int $status = null,
    ) {
    }
}
