<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of Jira expressions for analysis. */
final readonly class JiraExpressionForAnalysis extends Dto
{
    public function __construct(
        /**
         * The list of Jira expressions to analyse.
         * 
         * @var list<string>
         * 
         * @example 'issues.map(issue => issue.properties['property_key'])'
         */
        public array $expressions,

        /**
         * Context variables and their types.
         * The type checker assumes that "common context variables", such as `issue` or `project`, are available in context and sets their type.
         * Use this property to override the default types or provide details of new variables.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#context-variables
         * 
         * @var array<string,string>
         */
        public ?array $contextVariables = null,
    ) {
    }
}
