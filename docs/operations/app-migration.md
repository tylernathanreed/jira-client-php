# App Migration

DummyDescription

Source: [`Jira\Client\Operations\AppMigration`](/src/Operations/AppMigration.php)

## Operations

- [Bulk Update Custom Field Value](#AppIssueFieldValueUpdateResource.updateIssueFields_put)
- [Bulk Update Entity Properties](#MigrationResource.updateEntityPropertiesValue_put)
- [Get Workflow Transition Rule Configurations](#MigrationResource.workflowRuleSearch_post)

## Bulk Update Custom Field Value
<a name="AppIssueFieldValueUpdateResource.updateIssueFields_put"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-migration/#api-rest-atlassian-connect-1-migration-field-put

Updates the value of a custom field added by Connect apps on one or more issues
The values of up to 200 custom fields can be updated

**"Permissions" required:** Only Connect apps can make this request


### Request

#### Request Body

Source: [`Jira\Client\Schema\ConnectCustomFieldValues`](/docs/schema/connect-custom-field-values.md)

Details of updates for a custom field.

| Property | Type | Description |
| --- | --- | --- |
| `updateValueList` | [`?list<ConnectCustomFieldValue>`](/docs/schema/connect-custom-field-value.md) | The list of custom field update details. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `Atlassian-Transfer-Id` | `string` | The ID of the transfer. |

#### Response

`true`
## Bulk Update Entity Properties
<a name="MigrationResource.updateEntityPropertiesValue_put"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-migration/#api-rest-atlassian-connect-1-migration-properties-entity-type-put

Updates the values of multiple entity properties for an object, up to 50 updates per request.
This operation is for use by Connect apps during app migration.


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `Atlassian-Transfer-Id` | `string` | The app migration transfer ID. |
| `entityType` | `'IssueProperty'\|`<br/>`'CommentProperty'\|`<br/>`'DashboardItemProperty'\|`<br/>`'IssueTypeProperty'\|`<br/>`'ProjectProperty'\|`<br/>`'UserProperty'\|`<br/>`'WorklogProperty'\|`<br/>`'BoardProperty'\|`<br/>`'SprintProperty'` | The type indicating the object that contains the entity properties. |

#### Response

`true`
## Get Workflow Transition Rule Configurations
<a name="MigrationResource.workflowRuleSearch_post"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-migration/#api-rest-atlassian-connect-1-migration-workflow-rule-search-post

Returns configurations for workflow transition rules migrated from server to cloud and owned by the calling Connect app.


### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowRulesSearch`](/docs/schema/workflow-rules-search.md)

Details of the workflow and its transition rules.

| Property | Type | Description |
| --- | --- | --- |
| `ruleIds` | `list<string>` | The list of workflow rule IDs. |
| `workflowEntityId` | `string` | The workflow ID. |
| `expand` | `string` | Use expand to include additional information in the response. This parameter accepts `transition` which, for each rule, returns information about the transition the rule is assigned to. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `Atlassian-Transfer-Id` | `string` | The app migration transfer ID. |

#### Response

Source: [`Jira\Client\Schema\WorkflowRulesSearchDetails`](/docs/schema/workflow-rules-search-details.md)

Details of workflow transition rules.

| Property | Type | Description |
| --- | --- | --- |
| `invalidRules` | `?list<string>` | List of workflow rule IDs that do not belong to the workflow or can not be found. |
| `validRules` | [`?list<WorkflowTransitionRules>`](/docs/schema/workflow-transition-rules.md) | List of valid workflow transition rules. |
| `workflowEntityId` | `string` | The workflow ID. |
