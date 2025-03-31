# Entity Property

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

Source: [`Jira\Client\Schema\EntityProperty`](/src/Schema/EntityProperty.php)

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCommentProperties](/docs/operations/issue-comment-properties.md) | [getCommentProperty](/docs/operations/issue-comment-properties.md#get-comment-property) |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboardItemProperty](/docs/operations/dashboards.md#get-dashboard-item-property) |
| [IssueProperties](/docs/operations/issue-properties.md) | [getIssueProperty](/docs/operations/issue-properties.md#get-issue-property) |
| [IssueWorklogProperties](/docs/operations/issue-worklog-properties.md) | [getWorklogProperty](/docs/operations/issue-worklog-properties.md#get-worklog-property) |
| [IssueTypeProperties](/docs/operations/issue-type-properties.md) | [getIssueTypeProperty](/docs/operations/issue-type-properties.md#get-issue-type-property) |
| [ProjectProperties](/docs/operations/project-properties.md) | [getProjectProperty](/docs/operations/project-properties.md#get-project-property) |
| [UserProperties](/docs/operations/user-properties.md) | [getUserProperty](/docs/operations/user-properties.md#get-user-property) |
| [AppProperties](/docs/operations/app-properties.md) | [AddonPropertiesResource.getAddonProperty_get](/docs/operations/app-properties.md#addon-properties-resource.get-addon-property_get) |

### Schema

| Group | Operation |
| --- | --- |
| [ChangedWorklog](/docs/schema/changed-worklog.md) |
| [Comment](/docs/schema/comment.md) |
| [IssueUpdateDetails](/docs/schema/issue-update-details.md) |
| [Worklog](/docs/schema/worklog.md) |
