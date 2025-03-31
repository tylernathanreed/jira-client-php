# Field

Details of a field.

Source: [`Jira\Client\Schema\Field`](src/Schema/Field.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the field. |
| `name` | `string` | The name of the field. |
| `schema` | `JsonTypeBean` |  |
| `contextsCount` | `int` | Number of contexts where the field is used. |
| `description` | `string` | The description of the field. |
| `isLocked` | `bool` | Whether the field is locked. |
| `isUnscreenable` | `bool` | Whether the field is shown on screen or not. |
| `key` | `string` | The key of the field. |
| `lastUsed` | `FieldLastUsed` |  |
| `projectsCount` | `int` | Number of projects where the field is used. |
| `screensCount` | `int` | Number of screens where the field is used. |
| `searcherKey` | `string` | The searcher key of the field. Returned for custom fields. |
| `stableId` | `string` | The stable ID of the field. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanField](/docs/schema/page-bean-field.md) |
