<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlFunctionPrecomputationUpdateRequestBeanDoc
final readonly class JqlFunctionPrecomputationUpdateRequestBean extends Dto
{
    public function __construct(
        public ?array $values = null,
    ) {
    }
}
