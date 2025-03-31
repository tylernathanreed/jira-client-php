# Order Of Issue Types

An ordered list of issue type IDs and information about where to move them.

Source: [`Jira\Client\Schema\OrderOfIssueTypes`](/src/Schema/OrderOfIssueTypes.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | A list of the issue type IDs to move. The order of the issue type IDs in the list is the order they are given after the move. |
| `after` | `string` | The ID of the issue type to place the moved issue types after. Required if `position` isn't provided. |
| `position` | `'First'\|'Last'\|null` | The position the issue types should be moved to. Required if `after` isn't provided. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeSchemes](/docs/operations/issue-type-schemes.md) | [reorderIssueTypesInIssueTypeScheme](/docs/operations/issue-type-schemes.md#reorder-issue-types-in-issue-type-scheme) |

### Schema

*None*
