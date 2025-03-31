# Project Issue Type Hierarchy

The hierarchy of issue types within a project.

Source: [`Jira\Client\Schema\ProjectIssueTypeHierarchy`](/src/Schema/ProjectIssueTypeHierarchy.php)

| Property | Type | Description |
| --- | --- | --- |
| `hierarchy` | `?list<[ProjectIssueTypesHierarchyLevel](/src/Schema/ProjectIssueTypesHierarchyLevel.php)>` | Details of an issue type hierarchy level. |
| `projectId` | `int` | The ID of the project. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Projects](/docs/operations/projects.md) | [getHierarchy](/docs/operations/projects.md#get-hierarchy) |

### Schema

*None*
