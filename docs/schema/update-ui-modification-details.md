# Update Ui Modification Details

The details of a UI modification.

Source: [`Jira\Client\Schema\UpdateUiModificationDetails`](/src/Schema/UpdateUiModificationDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `contexts` | `?list<UiModificationContextDetails>` | List of contexts of the UI modification. The maximum number of contexts is 1000. If provided, replaces all existing contexts. |
| `data` | `string` | The data of the UI modification. The maximum size of the data is 50000 characters. |
| `description` | `string` | The description of the UI modification. The maximum length is 255 characters. |
| `name` | `string` | The name of the UI modification. The maximum length is 255 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UIModificationsApps](/docs/operations/u-i-modifications-apps.md) | [updateUiModification](/docs/operations/u-i-modifications-apps.md#update-ui-modification) |

### Schema

*None*
