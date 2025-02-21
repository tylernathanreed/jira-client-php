<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Request to fetch precomputations by ID. */
final readonly class JqlFunctionPrecomputationGetByIdRequest extends Dto
{
    public function __construct(
        public ?array $precomputationIDs = null,
    ) {
    }
}
