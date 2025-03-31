# Multiple Custom Field Values Update

A custom field and its new value with a list of issue to update.

Source: [`Jira\Client\Schema\MultipleCustomFieldValuesUpdate`](/src/Schema/MultipleCustomFieldValuesUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `customField` | `string` | The ID or key of the custom field. For example, `customfield_10010`. |
| `issueIds` | `list<int>` | The list of issue IDs. |
| `value` | `mixed` | The value for the custom field. The value must be compatible with the [custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#data-types) as follows:<br/><br/> *  `string` the value must be a string.<br/> *  `number` the value must be a number.<br/> *  `datetime` the value must be a string that represents a date in the ISO format or the simplified extended ISO format. For example, `"2023-01-18T12:00:00-03:00"` or `"2023-01-18T12:00:00.000Z"`. However, the milliseconds part is ignored.<br/> *  `user` the value must be an object that contains the `accountId` field.<br/> *  `group` the value must be an object that contains the group `name` or `groupId` field. Because group names can change, we recommend using `groupId`.<br/><br/>A list of appropriate values must be provided if the field is of the `list` [collection type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#collection-types). |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [MultipleCustomFieldValuesUpdateDetails](/docs/schema/multiple-custom-field-values-update-details.md) |
