<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Result of updating JQL Function precomputations. */
final readonly class JqlFunctionPrecomputationUpdateResponse extends Dto
{
    public function __construct(
        /**
         * List of precomputations that were not found and skipped.
         * Only returned if the request passed skipNotFoundPrecomputations=true.
         * 
         * @var ?list<string>
         */
        public ?array $notFoundPrecomputationIDs = null,
    ) {
    }
}
