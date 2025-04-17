<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** An operand that is a user-provided value. */
final class ValueOperand extends Dto
{
    public function __construct(
        /** The operand value. */
        public string $value,

        /** Encoded value, which can be used directly in a JQL query. */
        public ?string $encodedValue = null,
    ) {
    }
}
