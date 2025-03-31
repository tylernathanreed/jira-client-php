# Jira Issue Fields


Source: [`Jira\Client\Schema\JiraIssueFields`](/src/Schema/JiraIssueFields.php)

| Property | Type | Description |
| --- | --- | --- |
| `cascadingSelectFields` | [`?list<JiraCascadingSelectField>`](/docs/schemas/jira-cascading-select-field.md) | Add or clear a cascading select field:

 *  To add, specify `optionId` for both parent and child.
 *  To clear the child, set its `optionId` to null.
 *  To clear both, set the parent's `optionId` to null. |
| `clearableNumberFields` | [`?list<JiraNumberField>`](/docs/schemas/jira-number-field.md) | Add or clear a number field:

 *  To add, specify a numeric `value`.
 *  To clear, set `value` to `null`. |
| `colorFields` | [`?list<JiraColorField>`](/docs/schemas/jira-color-field.md) | Add or clear a color field:

 *  To add, specify the color `name`. Available colors are: `purple`, `blue`, `green`, `teal`, `yellow`, `orange`, `grey`, `dark purple`, `dark blue`, `dark green`, `dark teal`, `dark yellow`, `dark orange`, `dark grey`.
 *  To clear, set the color `name` to an empty string. |
| `datePickerFields` | [`?list<JiraDateField>`](/docs/schemas/jira-date-field.md) | Add or clear a date picker field:

 *  To add, specify the date in `d/mmm/yy` format or ISO format `dd-mm-yyyy`.
 *  To clear, set `formattedDate` to an empty string. |
| `dateTimePickerFields` | [`?list<JiraDateTimeField>`](/docs/schemas/jira-date-time-field.md) | Add or clear the planned start date and time:

 *  To add, specify the date and time in ISO format for `formattedDateTime`.
 *  To clear, provide an empty string for `formattedDateTime`. |
| `issueType` | `JiraIssueTypeField` | Set the issue type field by providing an `issueTypeId`. |
| `labelsFields` | [`?list<JiraLabelsField>`](/docs/schemas/jira-labels-field.md) | Edit a labels field:

 *  Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits.
 *  To clear labels, use the `REMOVE_ALL` option with an empty `labels` array. |
| `multipleGroupPickerFields` | [`?list<JiraMultipleGroupPickerField>`](/docs/schemas/jira-multiple-group-picker-field.md) | Add or clear a multi-group picker field:

 *  To add groups, provide an array of groups with `groupName`s.
 *  To clear all groups, use an empty `groups` array. |
| `multipleSelectClearableUserPickerFields` | [`?list<JiraMultipleSelectUserPickerField>`](/docs/schemas/jira-multiple-select-user-picker-field.md) | Assign or unassign multiple users to/from a field:

 *  To assign, provide an array of user `accountId`s.
 *  To clear, set `users` to `null`. |
| `multipleSelectFields` | [`?list<JiraMultipleSelectField>`](/docs/schemas/jira-multiple-select-field.md) | Add or clear a multi-select field:

 *  To add, provide an array of options with `optionId`s.
 *  To clear, use an empty `options` array. |
| `multipleVersionPickerFields` | [`?list<JiraMultipleVersionPickerField>`](/docs/schemas/jira-multiple-version-picker-field.md) | Edit a multi-version picker field like Fix Versions/Affects Versions:

 *  Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits.
 *  To clear the field, use the `REMOVE_ALL` option with an empty `versions` array. |
| `multiselectComponents` | `JiraMultiSelectComponentField` | Edit a multi select components field:

 *  Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits.
 *  To clear, use the `REMOVE_ALL` option with an empty `components` array. |
| `originalEstimateField` | `JiraDurationField` | Edit the original estimate field. |
| `priority` | `JiraPriorityField` | Set the priority of an issue by specifying a `priorityId`. |
| `richTextFields` | [`?list<JiraRichTextField>`](/docs/schemas/jira-rich-text-field.md) | Add or clear a rich text field:

 *  To add, provide `adfValue`. Note that rich text fields only support ADF values.
 *  To clear, use an empty `richText` object.

For ADF format details, refer to: [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure). |
| `singleGroupPickerFields` | [`?list<JiraSingleGroupPickerField>`](/docs/schemas/jira-single-group-picker-field.md) | Add or clear a single group picker field:

 *  To add, specify the group with `groupName`.
 *  To clear, set `groupName` to an empty string. |
| `singleLineTextFields` | [`?list<JiraSingleLineTextField>`](/docs/schemas/jira-single-line-text-field.md) | Add or clear a single line text field:

 *  To add, provide the `text` value.
 *  To clear, set `text` to an empty string. |
| `singleSelectClearableUserPickerFields` | [`?list<JiraSingleSelectUserPickerField>`](/docs/schemas/jira-single-select-user-picker-field.md) | Edit assignment for single select user picker fields like Assignee/Reporter:

 *  To assign an issue, specify the user's `accountId`.
 *  To unassign an issue, set `user` to `null`.
 *  For automatic assignment, set `accountId` to `-1`. |
| `singleSelectFields` | [`?list<JiraSingleSelectField>`](/docs/schemas/jira-single-select-field.md) | Add or clear a single select field:

 *  To add, specify the option with an `optionId`.
 *  To clear, pass an option with `optionId` as `-1`. |
| `singleVersionPickerFields` | [`?list<JiraSingleVersionPickerField>`](/docs/schemas/jira-single-version-picker-field.md) | Add or clear a single version picker field:

 *  To add, specify the version with a `versionId`.
 *  To clear, set `versionId` to `-1`. |
| `timeTrackingField` | `JiraTimeTrackingField` | Edit the time tracking field. |
| `urlFields` | [`?list<JiraUrlField>`](/docs/schemas/jira-url-field.md) | Add or clear a URL field:

 *  To add, provide the `url` with the desired URL value.
 *  To clear, set `url` to an empty string. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueBulkEditPayload](/docs/schema/issue-bulk-edit-payload.md) |
