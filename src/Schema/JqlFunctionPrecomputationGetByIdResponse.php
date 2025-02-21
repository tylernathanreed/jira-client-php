<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Get precomputations by ID response. */
final readonly class JqlFunctionPrecomputationGetByIdResponse extends Dto
{
    public function __construct(
        /**
         * List of precomputations that were not found.
         * 
         * @var ?list<string>
         */
        public ?array $notFoundPrecomputationIDs = null,

        /**
         * The list of precomputations.
         * 
         * @var ?list<JqlFunctionPrecomputationBean>
         */
        public ?array $precomputations = null,
    ) {
    }
}
