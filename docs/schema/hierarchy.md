# Hierarchy

The project issue type hierarchy.

Source: [`Jira\Client\Schema\Hierarchy`](/src/Schema/Hierarchy.php)

| Property | Type | Description |
| --- | --- | --- |
| `baseLevelId` | `int` | The ID of the base level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |
| `levels` | [`?list<SimplifiedHierarchyLevel>`](/src/Schema/SimplifiedHierarchyLevel.php) | Details about the hierarchy level. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Project](/docs/schema/project.md) |
