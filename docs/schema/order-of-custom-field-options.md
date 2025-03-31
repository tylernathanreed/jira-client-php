# Order Of Custom Field Options

An ordered list of custom field option IDs and information on where to move them.

Source: [`Jira\Client\Schema\OrderOfCustomFieldOptions`](/src/Schema/OrderOfCustomFieldOptions.php)

| Property | Type | Description |
| --- | --- | --- |
| `customFieldOptionIds` | `array` | A list of IDs of custom field options to move. The order of the custom field option IDs in the list is the order they are given after the move. The list must contain custom field options or cascading options, but not both. |
| `after` | `string` | The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided. |
| `position` | `string` | The position the custom field options should be moved to. Required if `after` isn't provided. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldOptions](/docs/operations/issue-custom-field-options.md) | [reorderCustomFieldOptions](/docs/operations/issue-custom-field-options.md#reorder-custom-field-options) |

### Schema

*None*
