<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraExpressionsComplexityBeanDoc
final readonly class JiraExpressionsComplexityBean extends Dto
{
    public function __construct(
        /** The number of Jira REST API beans returned in the response. */
        public JiraExpressionsComplexityValueBean $beans,

        /**
         * The number of expensive operations executed while evaluating the expression.
         * Expensive operations are those that load additional data, such as entity properties, comments, or custom fields.
         */
        public JiraExpressionsComplexityValueBean $expensiveOperations,

        /** The number of primitive values returned in the response. */
        public JiraExpressionsComplexityValueBean $primitiveValues,

        /**
         * The number of steps it took to evaluate the expression, where a step is a high-level operation performed by the expression.
         * A step is an operation such as arithmetic, accessing a property, accessing a context variable, or calling a function.
         */
        public JiraExpressionsComplexityValueBean $steps,
    ) {
    }
}
