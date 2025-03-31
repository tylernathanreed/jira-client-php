# Visibility

The group or role to which this item is visible.

Source: [`Jira\Client\Schema\Visibility`](src/Schema/Visibility.php)

| Property | Type | Description |
| --- | --- | --- |
| `identifier` | `string` | The ID of the group or the name of the role that visibility of this item is restricted to. |
| `type` | `string` | Whether visibility of this item is restricted to a group or role. |
| `value` | `string` | The name of the group or role that visibility of this item is restricted to. Please note that the name of a group is mutable, to reliably identify a group use `identifier`. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Comment](/docs/schema/comment.md) |
| [Worklog](/docs/schema/worklog.md) |
