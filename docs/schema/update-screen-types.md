# Update Screen Types

The IDs of the screens for the screen types of the screen scheme.

Source: [`Jira\Client\Schema\UpdateScreenTypes`](src/Schema/UpdateScreenTypes.php)

| Property | Type | Description |
| --- | --- | --- |
| `create` | `string` | The ID of the create screen. To remove the screen association, pass a null. |
| `default` | `string` | The ID of the default screen. When specified, must include a screen ID as a default screen is required. |
| `edit` | `string` | The ID of the edit screen. To remove the screen association, pass a null. |
| `view` | `string` | The ID of the view screen. To remove the screen association, pass a null. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [UpdateScreenSchemeDetails](/docs/schema/update-screen-scheme-details.md) |
