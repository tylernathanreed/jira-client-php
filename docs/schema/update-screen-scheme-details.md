# Update Screen Scheme Details

Details of a screen scheme.

Source: [`Jira\Client\Schema\UpdateScreenSchemeDetails`](/src/Schema/UpdateScreenSchemeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the screen scheme. The maximum length is 255 characters. |
| `name` | `string` | The name of the screen scheme. The name must be unique. The maximum length is 255 characters. |
| `screens` | [`UpdateScreenTypes`](/docs/schema/update-screen-types.md) | The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ScreenSchemes](/docs/operations/screen-schemes.md) | [updateScreenScheme](/docs/operations/screen-schemes.md#update-screen-scheme) |

### Schema

*None*
