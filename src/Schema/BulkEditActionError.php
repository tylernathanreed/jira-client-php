<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkEditActionErrorDoc
final readonly class BulkEditActionError extends Dto
{
    public function __construct(
        /**
         * The error messages.
         * 
         * @var list<string>
         */
        public array $errorMessages,

        /**
         * The errors.
         * 
         * @var array<string,string>
         */
        public array $errors,
    ) {
    }
}
