# User Filter

Filter for a User Picker (single) custom field.

Source: [`Jira\Client\Schema\UserFilter`](/src/Schema/UserFilter.php)

| Property | Type | Description |
| --- | --- | --- |
| `enabled` | `bool` | Whether the filter is enabled. |
| `groups` | `?list<string>` | User groups autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 groups can be provided. |
| `roleIds` | `?list<int>` | Roles that autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 roles can be provided. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomFieldContextDefaultValueForgeUserField](/docs/schema/custom-field-context-default-value-forge-user-field.md) |
| [CustomFieldContextSingleUserPickerDefaults](/docs/schema/custom-field-context-single-user-picker-defaults.md) |
