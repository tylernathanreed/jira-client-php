<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Details about syntax and type errors.
 * The error details apply to the entire expression, unless the object includes:
 * 
 *  - `line` and `column`
 *  - `expression`
 */
final readonly class JiraExpressionValidationError extends Dto
{
    public function __construct(
        /**
         * Details about the error.
         * 
         * @example '!, -, typeof, (, IDENTIFIER, null, true, false, NUMBER, STRING, TEMPLATE_LITERAL, new, [ or { expected, > encountered.'
         */
        public string $message,

        /**
         * The error type.
         * 
         * @var 'syntax'|'type'|'other'
         */
        public string $type,

        /** The text column in which the error occurred. */
        public ?int $column = null,

        /** The part of the expression in which the error occurred. */
        public ?string $expression = null,

        /** The text line in which the error occurred. */
        public ?int $line = null,
    ) {
    }
}
