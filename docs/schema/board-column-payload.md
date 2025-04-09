# Board Column Payload

The payload for creating a board column

Source: [`Jira\Client\Schema\BoardColumnPayload`](/src/Schema/BoardColumnPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `maximumIssueConstraint` | `int` | The maximum issue constraint for the column |
| `minimumIssueConstraint` | `int` | The minimum issue constraint for the column |
| `name` | `string` | The name of the column |
| `statusIds` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | The status IDs for the column |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [BoardPayload](/docs/schema/board-payload.md) |
