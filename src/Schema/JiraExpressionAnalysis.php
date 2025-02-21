<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraExpressionAnalysisDoc
final readonly class JiraExpressionAnalysis extends Dto
{
    public function __construct(
        /** The analysed expression. */
        public string $expression,

        /**
         * Whether the expression is valid and the interpreter will evaluate it.
         * Note that the expression may fail at runtime (for example, if it executes too many expensive operations).
         */
        public bool $valid,

        public ?JiraExpressionComplexity $complexity = null,

        /**
         * A list of validation errors.
         * Not included if the expression is valid.
         * 
         * @var ?list<JiraExpressionValidationError>
         */
        public ?array $errors = null,

        /**
         * EXPERIMENTAL.
         * The inferred type of the expression.
         */
        public ?string $type = null,
    ) {
    }
}
