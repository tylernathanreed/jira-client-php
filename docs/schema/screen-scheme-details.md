# Screen Scheme Details

Details of a screen scheme.

Source: [`Jira\Client\Schema\ScreenSchemeDetails`](src/Schema/ScreenSchemeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen scheme. The name must be unique. The maximum length is 255 characters. |
| `screens` | `ScreenTypes` | The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted. |
| `description` | `string` | The description of the screen scheme. The maximum length is 255 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ScreenSchemes](/docs/operations/screen-schemes.md) | [createScreenScheme](/docs/operations/screen-schemes.md#create-screen-scheme) |

### Schema

*None*
