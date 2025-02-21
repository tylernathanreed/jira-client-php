<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlFunctionPrecomputationUpdateErrorResponseDoc
final readonly class JqlFunctionPrecomputationUpdateErrorResponse extends Dto
{
    public function __construct(
        /**
         * The list of error messages produced by this operation.
         * 
         * @var ?list<string>
         */
        public ?array $errorMessages = null,

        /**
         * List of precomputations that were not found.
         * 
         * @var ?list<string>
         */
        public ?array $notFoundPrecomputationIDs = null,
    ) {
    }
}
