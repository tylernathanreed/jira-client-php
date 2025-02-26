<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A rule configuration. */
final readonly class RuleConfiguration extends Dto
{
    public function __construct(
        /** Configuration of the rule, as it is stored by the Connect or the Forge app on the rule configuration page. */
        public string $value,

        /** Whether the rule is disabled. */
        public ?bool $disabled = false,

        /**
         * A tag used to filter rules in "Get workflow transition rule configurations".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get
         */
        public ?string $tag = null,
    ) {
    }
}
