# Create Ui Modification Details

The details of a UI modification.

Source: [`Jira\Client\Schema\CreateUiModificationDetails`](/src/Schema/CreateUiModificationDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the UI modification. The maximum length is 255 characters. |
| `contexts` | `?list<[UiModificationContextDetails](/src/Schema/UiModificationContextDetails.php)>` | List of contexts of the UI modification. The maximum number of contexts is 1000. |
| `data` | `string` | The data of the UI modification. The maximum size of the data is 50000 characters. |
| `description` | `string` | The description of the UI modification. The maximum length is 255 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UIModificationsApps](/docs/operations/u-i-modifications-apps.md) | [createUiModification](/docs/operations/u-i-modifications-apps.md#create-ui-modification) |

### Schema

*None*
