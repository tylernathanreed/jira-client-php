# Simplified Hierarchy Level


Source: [`Jira\Client\Schema\SimplifiedHierarchyLevel`](/src/Schema/SimplifiedHierarchyLevel.php)

| Property | Type | Description |
| --- | --- | --- |
| `aboveLevelId` | `` | The ID of the level above this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |
| `belowLevelId` | `` | The ID of the level below this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |
| `externalUuid` | `` | The external UUID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |
| `hierarchyLevelNumber` | `` |  |
| `id` | `` | The ID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |
| `issueTypeIds` | `?list<int>` | The issue types available in this hierarchy level. |
| `level` | `` | The level of this item in the hierarchy. |
| `name` | `` | The name of this hierarchy level. |
| `projectConfigurationId` | `` | The ID of the project configuration. This property is deprecated, see [Change oticen: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/). |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Hierarchy](/docs/schema/hierarchy.md) |
