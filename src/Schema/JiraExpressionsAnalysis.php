<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraExpressionsAnalysisDoc
final readonly class JiraExpressionsAnalysis extends Dto
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
