<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * An operand that is a function.
 * See "Advanced searching - functions reference" for more information about JQL functions.
 * 
 * @link https://confluence.atlassian.com/x/dwiiLQ
 */
final readonly class FunctionOperand extends Dto
{
    public function __construct(
        /**
         * The list of function arguments.
         * 
         * @var list<string>
         */
        public array $arguments,

        /** The name of the function. */
        public string $function,

        /** Encoded operand, which can be used directly in a JQL query. */
        public ?string $encodedOperand = null,
    ) {
    }
}
