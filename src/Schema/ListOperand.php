<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** An operand that is a list of values. */
final class ListOperand extends Dto
{
    public function __construct(
        /**
         * The list of operand values.
         * 
         * @var list<JqlQueryUnitaryOperand>
         */
        public array $values,

        /** Encoded operand, which can be used directly in a JQL query. */
        public ?string $encodedOperand = null,
    ) {
    }
}
