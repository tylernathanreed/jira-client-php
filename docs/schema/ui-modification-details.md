# Ui Modification Details

The details of a UI modification.

Source: [`Jira\Client\Schema\UiModificationDetails`](/src/Schema/UiModificationDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the UI modification. |
| `name` | `string` | The name of the UI modification. The maximum length is 255 characters. |
| `self` | `string` | The URL of the UI modification. |
| `contexts` | `array` | List of contexts of the UI modification. The maximum number of contexts is 1000. |
| `data` | `string` | The data of the UI modification. The maximum size of the data is 50000 characters. |
| `description` | `string` | The description of the UI modification. The maximum length is 255 characters. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanUiModificationDetails](/docs/schema/page-bean-ui-modification-details.md) |
