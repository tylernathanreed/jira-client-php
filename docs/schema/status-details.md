# Status Details

A status.

Source: [`Jira\Client\Schema\StatusDetails`](src/Schema/StatusDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the status. |
| `iconUrl` | `string` | The URL of the icon used to represent the status. |
| `id` | `string` | The ID of the status. |
| `name` | `string` | The name of the status. |
| `scope` | `Scope` | The scope of the field. |
| `self` | `string` | The URL of the status. |
| `statusCategory` | `StatusCategory` | The category assigned to the status. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowStatuses](/docs/operations/workflow-statuses.md) | [getStatuses](/docs/operations/workflow-statuses.md#get-statuses) |
| [WorkflowStatuses](/docs/operations/workflow-statuses.md) | [getStatus](/docs/operations/workflow-statuses.md#get-status) |

### Schema

| Group | Operation |
| --- | --- |
| [Fields](/docs/schema/fields.md) |
| [IssueTransition](/docs/schema/issue-transition.md) |
| [IssueTypeWithStatus](/docs/schema/issue-type-with-status.md) |
