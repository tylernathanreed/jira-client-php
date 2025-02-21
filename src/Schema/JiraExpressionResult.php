<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The result of evaluating a Jira expression. */
final readonly class JiraExpressionResult extends Dto
{
    public function __construct(
        /**
         * The value of the evaluated expression.
         * It may be a primitive JSON value or a Jira REST API object.
         * (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned.
         * These string representations should not be relied upon and may change without notice.)
         */
        public mixed $value,

        /** Contains various characteristics of the performed expression evaluation. */
        public ?JiraExpressionEvaluationMetaDataBean $meta = null,
    ) {
    }
}
