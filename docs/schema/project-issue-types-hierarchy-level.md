# Project Issue Types Hierarchy Level

Details of an issue type hierarchy level.

Source: [`Jira\Client\Schema\ProjectIssueTypesHierarchyLevel`](/src/Schema/ProjectIssueTypesHierarchyLevel.php)

| Property | Type | Description |
| --- | --- | --- |
| `entityId` | `string` | The ID of the issue type hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |
| `issueTypes` | `?list<[IssueTypeInfo](/src/Schema/IssueTypeInfo.php)>` | The list of issue types in the hierarchy level. |
| `level` | `int` | The level of the issue type hierarchy level. |
| `name` | `string` | The name of the issue type hierarchy level. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ProjectIssueTypeHierarchy](/docs/schema/project-issue-type-hierarchy.md) |
