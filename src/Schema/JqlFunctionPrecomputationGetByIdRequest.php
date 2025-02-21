<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlFunctionPrecomputationGetByIdRequestDoc
final readonly class JqlFunctionPrecomputationGetByIdRequest extends Dto
{
    public function __construct(
        public ?array $precomputationIDs = null,
    ) {
    }
}
