# Custom Field Value Update

A list of issue IDs and the value to update a custom field to.

Source: [`Jira\Client\Schema\CustomFieldValueUpdate`](/src/Schema/CustomFieldValueUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `list<int>` | The list of issue IDs. |
| `value` | `mixed` | The value for the custom field. The value must be compatible with the [custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#data-types) as follows:<br/><br/> *  `string` the value must be a string.<br/> *  `number` the value must be a number.<br/> *  `datetime` the value must be a string that represents a date in the ISO format or the simplified extended ISO format. For example, `"2023-01-18T12:00:00-03:00"` or `"2023-01-18T12:00:00.000Z"`. However, the milliseconds part is ignored.<br/> *  `user` the value must be an object that contains the `accountId` field.<br/> *  `group` the value must be an object that contains the group `name` or `groupId` field. Because group names can change, we recommend using `groupId`.<br/><br/>A list of appropriate values must be provided if the field is of the `list` [collection type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/#collection-types). |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomFieldValueUpdateDetails](/docs/schema/custom-field-value-update-details.md) |
