<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details about the analysed Jira expression. */
final class JiraExpressionsAnalysis extends Dto
{
    public function __construct(
        /**
         * The results of Jira expressions analysis.
         * 
         * @var list<JiraExpressionAnalysis>
         */
        public array $results,
    ) {
    }
}
