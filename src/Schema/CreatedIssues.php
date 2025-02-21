<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the issues created and the errors for requests that failed. */
final readonly class CreatedIssues extends Dto
{
    public function __construct(
        /**
         * Error details for failed issue creation requests.
         * 
         * @var ?list<BulkOperationErrorResult>
         */
        public ?array $errors = null,

        /**
         * Details of the issues created.
         * 
         * @var ?list<CreatedIssue>
         */
        public ?array $issues = null,
    ) {
    }
}
