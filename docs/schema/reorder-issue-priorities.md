# Reorder Issue Priorities

Change the order of issue priorities.

Source: [`Jira\Client\Schema\ReorderIssuePriorities`](/src/Schema/ReorderIssuePriorities.php)

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `list<string>` | The list of issue IDs to be reordered. Cannot contain duplicates nor after ID. |
| `after` | `` | The ID of the priority. Required if `position` isn't provided. |
| `position` | `` | The position for issue priorities to be moved to. Required if `after` isn't provided. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [movePriorities](/docs/operations/issue-priorities.md#move-priorities) |

### Schema

*None*
