<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of pairs (id and value) for precomputation updates. */
final readonly class JqlFunctionPrecomputationUpdateRequestBean extends Dto
{
    public function __construct(
        /** @var ?list<JqlFunctionPrecomputationUpdateBean> */
        public ?array $values = null,
    ) {
    }
}
