<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Errors of bulk edit action. */
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
