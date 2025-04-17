<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of pairs (id and value) for precomputation updates. */
final class JqlFunctionPrecomputationUpdateRequestBean extends Dto
{
    public function __construct(
        /** @var ?list<JqlFunctionPrecomputationUpdateBean> */
        public ?array $values = null,
    ) {
    }
}
