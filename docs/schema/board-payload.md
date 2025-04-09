# Board Payload

The payload for creating a board

Source: [`Jira\Client\Schema\BoardPayload`](/src/Schema/BoardPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `boardFilterJQL` | `string` | Takes in a JQL string to create a new filter. If no value is provided, it'll default to a JQL filter for the project creating |
| `cardLayout` | [`CardLayout`](/docs/schema/card-layout.md) |  |
| `columns` | [`?list<BoardColumnPayload>`](/docs/schema/board-column-payload.md) | The columns of the board |
| `features` | [`?list<BoardFeaturePayload>`](/docs/schema/board-feature-payload.md) | Feature settings for the board |
| `name` | `string` | The name of the board |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `quickFilters` | [`?list<QuickFilterPayload>`](/docs/schema/quick-filter-payload.md) | The quick filters for the board. |
| `supportsSprint` | `bool` | Whether sprints are supported on the board |
| `swimlanes` | [`SwimlanesPayload`](/docs/schema/swimlanes-payload.md) |  |
| `workingDaysConfig` | [`WorkingDaysConfig`](/docs/schema/working-days-config.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [BoardsPayload](/docs/schema/boards-payload.md) |
