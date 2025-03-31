# Custom Field Context Default Value Multiple Version Picker

The default value for a multiple version picker custom field.

Source: [`Jira\Client\Schema\CustomFieldContextDefaultValueMultipleVersionPicker`](/src/Schema/CustomFieldContextDefaultValueMultipleVersionPicker.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` |  |
| `versionIds` | `list<string>` | The IDs of the default versions. |
| `versionOrder` | `string` | The order the pickable versions are displayed in. If not provided, the released-first order is used. Available version orders are `"releasedFirst"` and `"unreleasedFirst"`. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomFieldContextDefaultValue](/docs/schema/custom-field-context-default-value.md) |
