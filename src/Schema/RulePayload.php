<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating rules in a workflow */
final readonly class RulePayload extends Dto
{
    public function __construct(
        /**
         * The parameters of the rule
         * 
         * @var array<string,string>
         */
        public ?array $parameters = null,

        /**
         * The key of the rule.
         * See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/\#api-rest-api-3-workflows-capabilities-get
         * 
         * @example 'system:update-field'
         */
        public ?string $ruleKey = null,
    ) {
    }
}
