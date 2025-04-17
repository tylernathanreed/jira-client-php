<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Request to fetch precomputations by ID. */
final class JqlFunctionPrecomputationGetByIdRequest extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $precomputationIDs = null,
    ) {
    }
}
