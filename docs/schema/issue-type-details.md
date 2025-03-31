# Issue Type Details

Details about an issue type.

Source: [`Jira\Client\Schema\IssueTypeDetails`](src/Schema/IssueTypeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID of the issue type's avatar. |
| `description` | `string` | The description of the issue type. |
| `entityId` | `string` | Unique ID for next-gen projects. |
| `hierarchyLevel` | `int` | Hierarchy level of the issue type. |
| `iconUrl` | `string` | The URL of the issue type's avatar. |
| `id` | `string` | The ID of the issue type. |
| `name` | `string` | The name of the issue type. |
| `scope` | `Scope` | Details of the next-gen projects the issue type is available in. |
| `self` | `string` | The URL of these issue type details. |
| `subtask` | `bool` | Whether this issue type is used to create subtasks. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypes](/docs/operations/issue-types.md) | [getIssueAllTypes](/docs/operations/issue-types.md#get-issue-all-types) |
| [IssueTypes](/docs/operations/issue-types.md) | [createIssueType](/docs/operations/issue-types.md#create-issue-type) |
| [IssueTypes](/docs/operations/issue-types.md) | [getIssueTypesForProject](/docs/operations/issue-types.md#get-issue-types-for-project) |
| [IssueTypes](/docs/operations/issue-types.md) | [getIssueType](/docs/operations/issue-types.md#get-issue-type) |
| [IssueTypes](/docs/operations/issue-types.md) | [updateIssueType](/docs/operations/issue-types.md#update-issue-type) |
| [IssueTypes](/docs/operations/issue-types.md) | [getAlternativeIssueTypes](/docs/operations/issue-types.md#get-alternative-issue-types) |

### Schema

| Group | Operation |
| --- | --- |
| [Fields](/docs/schema/fields.md) |
| [Project](/docs/schema/project.md) |
| [WorkflowScheme](/docs/schema/workflow-scheme.md) |
