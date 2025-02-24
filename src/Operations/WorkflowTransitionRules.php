<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowTransitionRules
{
    /**
     * Returns a "paginated" list of workflows with transition rules.
     * The workflows can be filtered to return only those containing workflow transition rules:
     * 
     *  - of one or more transition rule types, such as "workflow post functions"
     *  - matching one or more transition rule keys
     * 
     * Only workflows containing transition rules created by the calling "Connect" or "Forge" app are returned
     * 
     * Due to server-side optimizations, workflows with an empty list of rules may be returned; these workflows can be ignored
     * 
     * **"Permissions" required:** Only "Connect" or "Forge" apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#forge-apps
     * 
     * @param list<'postfunction'|'condition'|'validator'> $types The types of the transition rules to return.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<string> $keys The transition rule class keys, as defined in the Connect or the Forge app descriptor, of the transition rules to return.
     * @param ?list<string> $workflowNames The list of workflow names to filter by.
     * @param ?list<string> $withTags The list of `tags` to filter by.
     * @param bool $draft Whether draft or published workflows are returned.
     *                    If not provided, both workflow types are returned.
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts `transition`, which, for each rule, returns information about the transition the rule is assigned to.
     */
    public function getWorkflowTransitionRuleConfigurations(
        array $types,
        ?int $startAt = 0,
        ?int $maxResults = 10,
        ?array $keys = null,
        ?array $workflowNames = null,
        ?array $withTags = null,
        ?bool $draft = null,
        ?string $expand = null,
    ): Schema\PageBeanWorkflowTransitionRules {
        return $this->call(
            uri: '/rest/api/3/workflow/rule/config',
            method: 'get',
            query: compact('types', 'startAt', 'maxResults', 'keys', 'workflowNames', 'withTags', 'draft', 'expand'),
            success: 200,
            schema: Schema\PageBeanWorkflowTransitionRules::class,
        );
    }

    /**
     * Updates configuration of workflow transition rules.
     * The following rule types are supported:
     * 
     *  - "post functions"
     *  - "conditions"
     *  - "validators"
     * 
     * Only rules created by the calling "Connect" or "Forge" app can be updated
     * 
     * To assist with app migration, this operation can be used to:
     * 
     *  - Disable a rule
     *  - Add a `tag`.
     * Use this to filter rules in the "Get workflow transition rule configurations"
     * 
     * Rules are enabled if the `disabled` parameter is not provided
     * 
     * **"Permissions" required:** Only "Connect" or "Forge" apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#forge-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get
     */
    public function updateWorkflowTransitionRuleConfigurations(
        Schema\WorkflowTransitionRulesUpdate $request,
    ): Schema\WorkflowTransitionRulesUpdateErrors {
        return $this->call(
            uri: '/rest/api/3/workflow/rule/config',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\WorkflowTransitionRulesUpdateErrors::class,
        );
    }

    /**
     * Deletes workflow transition rules from one or more workflows.
     * These rule types are supported:
     * 
     *  - "post functions"
     *  - "conditions"
     *  - "validators"
     * 
     * Only rules created by the calling Connect app can be deleted
     * 
     * **"Permissions" required:** Only Connect apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/
     */
    public function deleteWorkflowTransitionRuleConfigurations(
        Schema\WorkflowsWithTransitionRulesDetails $request,
    ): Schema\WorkflowTransitionRulesUpdateErrors {
        return $this->call(
            uri: '/rest/api/3/workflow/rule/config/delete',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\WorkflowTransitionRulesUpdateErrors::class,
        );
    }
}
