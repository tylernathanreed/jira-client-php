# Workflow Transition Rules

Source: [`Jira\Client\Operations\WorkflowTransitionRules`](/src/Operations/WorkflowTransitionRules.php)

## Operations

- [Get Workflow Transition Rule Configurations](#getWorkflowTransitionRuleConfigurations)
- [Update Workflow Transition Rule Configurations](#updateWorkflowTransitionRuleConfigurations)
- [Delete Workflow Transition Rule Configurations](#deleteWorkflowTransitionRuleConfigurations)

## Get Workflow Transition Rule Configurations
<a name="getWorkflowTransitionRuleConfigurations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get

Returns a "paginated" list of workflows with transition rules.
The workflows can be filtered to return only those containing workflow transition rules:

 - of one or more transition rule types, such as "workflow post functions"
 - matching one or more transition rule keys

Only workflows containing transition rules created by the calling "Connect" or "Forge" app are returned

Due to server-side optimizations, workflows with an empty list of rules may be returned; these workflows can be ignored

**"Permissions" required:** Only "Connect" or "Forge" apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/
See: https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/index/#forge-apps

### Example

```php
/** @var Schema\PageBeanWorkflowTransitionRules $response */
$response = $client->getWorkflowTransitionRuleConfigurations(
    types: ['postfunction'],
    startAt: 0,
    maxResults: 10,
    keys: null,
    workflowNames: null,
    withTags: null,
    draft: null,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `types` | `list<'postfunction'\|`<br/>`'condition'\|`<br/>`'validator'>` | The types of the transition rules to return. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `keys` | `?list<string>` | The transition rule class keys, as defined in the Connect or the Forge app descriptor, of the transition rules to return. |
| `workflowNames` | `?list<string>` | The list of workflow names to filter by. |
| `withTags` | `?list<string>` | The list of `tags` to filter by. |
| `draft` | `?bool` | Whether draft or published workflows are returned. If not provided, both workflow types are returned. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts `transition`, which, for each rule, returns information about the transition the rule is assigned to. |

#### Response

Source: [`Jira\Client\Schema\PageBeanWorkflowTransitionRules`](/docs/schema/page-bean-workflow-transition-rules.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<WorkflowTransitionRules>`](/docs/schema/workflow-transition-rules.md) | The list of items. |


## Update Workflow Transition Rule Configurations
<a name="updateWorkflowTransitionRuleConfigurations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-put

Updates configuration of workflow transition rules.
The following rule types are supported:

 - "post functions"
 - "conditions"
 - "validators"

Only rules created by the calling "Connect" or "Forge" app can be updated

To assist with app migration, this operation can be used to:

 - Disable a rule
 - Add a `tag`.
Use this to filter rules in the "Get workflow transition rule configurations"

Rules are enabled if the `disabled` parameter is not provided

**"Permissions" required:** Only "Connect" or "Forge" apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/
See: https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/index/#forge-apps
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowTransitionRulesUpdateErrors $response */
$response = $client->updateWorkflowTransitionRuleConfigurations(new Schema\WorkflowTransitionRulesUpdate(
    workflows: [
                [
                    'conditions' => [
                        [
                            'configuration' => [
                                'disabled' => '',
                                'tag' => 'Another tag',
                                'value' => '{ "size": "medium" }',
                            ],
                            'id' => 'd663bd873d93-59f5-11e9-8647-b4d6cbdc',
                            'key' => 'foo',
                        ],
                    ],
                    'postFunctions' => [
                        [
                            'configuration' => [
                                'disabled' => '',
                                'tag' => 'Sample tag',
                                'value' => '{ "color": "red" }',
                            ],
                            'id' => 'b4d6cbdc-59f5-11e9-8647-d663bd873d93',
                            'key' => 'bar',
                        ],
                    ],
                    'validators' => [
                        [
                            'configuration' => [
                                'disabled' => '',
                                'value' => '{ "shape": "square" }',
                            ],
                            'id' => '11e9-59f5-b4d6cbdc-8647-d663bd873d93',
                            'key' => 'baz',
                        ],
                    ],
                    'workflowId' => [
                        'draft' => '',
                        'name' => 'My Workflow name',
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowTransitionRulesUpdate`](/docs/schema/workflow-transition-rules-update.md)

Details about a workflow configuration update request.

| Property | Type | Description |
| --- | --- | --- |
| `workflows` | [`list<WorkflowTransitionRules>`](/docs/schema/workflow-transition-rules.md) | The list of workflows with transition rules to update. |

#### Response

Source: [`Jira\Client\Schema\WorkflowTransitionRulesUpdateErrors`](/docs/schema/workflow-transition-rules-update-errors.md)

Details of any errors encountered while updating workflow transition rules.

| Property | Type | Description |
| --- | --- | --- |
| `updateResults` | [`list<WorkflowTransitionRulesUpdateErrorDetails>`](/docs/schema/workflow-transition-rules-update-error-details.md) | A list of workflows. |


## Delete Workflow Transition Rule Configurations
<a name="deleteWorkflowTransitionRuleConfigurations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-delete-put

Deletes workflow transition rules from one or more workflows.
These rule types are supported:

 - "post functions"
 - "conditions"
 - "validators"

Only rules created by the calling Connect app can be deleted

**"Permissions" required:** Only Connect apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/
See: https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowTransitionRulesUpdateErrors $response */
$response = $client->deleteWorkflowTransitionRuleConfigurations(new Schema\WorkflowsWithTransitionRulesDetails(
    workflows: [
                [
                    'workflowId' => [
                        'draft' => '',
                        'name' => 'Internal support workflow',
                    ],
                    'workflowRuleIds' => [
                        'b4d6cbdc-59f5-11e9-8647-d663bd873d93',
                        'd663bd873d93-59f5-11e9-8647-b4d6cbdc',
                        '11e9-59f5-b4d6cbdc-8647-d663bd873d93',
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowsWithTransitionRulesDetails`](/docs/schema/workflows-with-transition-rules-details.md)

Details of workflows and their transition rules to delete.

| Property | Type | Description |
| --- | --- | --- |
| `workflows` | [`list<WorkflowTransitionRulesDetails>`](/docs/schema/workflow-transition-rules-details.md) | The list of workflows with transition rules to delete. |

#### Response

Source: [`Jira\Client\Schema\WorkflowTransitionRulesUpdateErrors`](/docs/schema/workflow-transition-rules-update-errors.md)

Details of any errors encountered while updating workflow transition rules.

| Property | Type | Description |
| --- | --- | --- |
| `updateResults` | [`list<WorkflowTransitionRulesUpdateErrorDetails>`](/docs/schema/workflow-transition-rules-update-error-details.md) | A list of workflows. |
