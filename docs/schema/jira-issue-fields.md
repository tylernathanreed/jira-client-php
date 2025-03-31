# Jira Issue Fields


Source: [`Jira\Client\Schema\JiraIssueFields`](/src/Schema/JiraIssueFields.php)

| Property | Type | Description |
| --- | --- | --- |
| `cascadingSelectFields` | `?list<[JiraCascadingSelectField](/src/Schema/JiraCascadingSelectField.php)>` | Add or clear a cascading select field:

 *  To add, specify `optionId` for both parent and child.
 *  To clear the child, set its `optionId` to null.
 *  To clear both, set the parent's `optionId` to null. |
| `clearableNumberFields` | `?list<[JiraNumberField](/src/Schema/JiraNumberField.php)>` | Add or clear a number field:

 *  To add, specify a numeric `value`.
 *  To clear, set `value` to `null`. |
| `colorFields` | `?list<[JiraColorField](/src/Schema/JiraColorField.php)>` | Add or clear a color field:

 *  To add, specify the color `name`. Available colors are: `purple`, `blue`, `green`, `teal`, `yellow`, `orange`, `grey`, `dark purple`, `dark blue`, `dark green`, `dark teal`, `dark yellow`, `dark orange`, `dark grey`.
 *  To clear, set the color `name` to an empty string. |
| `datePickerFields` | `?list<[JiraDateField](/src/Schema/JiraDateField.php)>` | Add or clear a date picker field:

 *  To add, specify the date in `d/mmm/yy` format or ISO format `dd-mm-yyyy`.
 *  To clear, set `formattedDate` to an empty string. |
| `dateTimePickerFields` | `?list<[JiraDateTimeField](/src/Schema/JiraDateTimeField.php)>` | Add or clear the planned start date and time:

 *  To add, specify the date and time in ISO format for `formattedDateTime`.
 *  To clear, provide an empty string for `formattedDateTime`. |
| `issueType` | `JiraIssueTypeField` | Set the issue type field by providing an `issueTypeId`. |
| `labelsFields` | `?list<[JiraLabelsField](/src/Schema/JiraLabelsField.php)>` | Edit a labels field:

 *  Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits.
 *  To clear labels, use the `REMOVE_ALL` option with an empty `labels` array. |
| `multipleGroupPickerFields` | `?list<[JiraMultipleGroupPickerField](/src/Schema/JiraMultipleGroupPickerField.php)>` | Add or clear a multi-group picker field:

 *  To add groups, provide an array of groups with `groupName`s.
 *  To clear all groups, use an empty `groups` array. |
| `multipleSelectClearableUserPickerFields` | `?list<[JiraMultipleSelectUserPickerField](/src/Schema/JiraMultipleSelectUserPickerField.php)>` | Assign or unassign multiple users to/from a field:

 *  To assign, provide an array of user `accountId`s.
 *  To clear, set `users` to `null`. |
| `multipleSelectFields` | `?list<[JiraMultipleSelectField](/src/Schema/JiraMultipleSelectField.php)>` | Add or clear a multi-select field:

 *  To add, provide an array of options with `optionId`s.
 *  To clear, use an empty `options` array. |
| `multipleVersionPickerFields` | `?list<[JiraMultipleVersionPickerField](/src/Schema/JiraMultipleVersionPickerField.php)>` | Edit a multi-version picker field like Fix Versions/Affects Versions:

 *  Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits.
 *  To clear the field, use the `REMOVE_ALL` option with an empty `versions` array. |
| `multiselectComponents` | `JiraMultiSelectComponentField` | Edit a multi select components field:

 *  Options include `ADD`, `REPLACE`, `REMOVE`, or `REMOVE_ALL` for bulk edits.
 *  To clear, use the `REMOVE_ALL` option with an empty `components` array. |
| `originalEstimateField` | `JiraDurationField` | Edit the original estimate field. |
| `priority` | `JiraPriorityField` | Set the priority of an issue by specifying a `priorityId`. |
| `richTextFields` | `?list<[JiraRichTextField](/src/Schema/JiraRichTextField.php)>` | Add or clear a rich text field:

 *  To add, provide `adfValue`. Note that rich text fields only support ADF values.
 *  To clear, use an empty `richText` object.

For ADF format details, refer to: [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure). |
| `singleGroupPickerFields` | `?list<[JiraSingleGroupPickerField](/src/Schema/JiraSingleGroupPickerField.php)>` | Add or clear a single group picker field:

 *  To add, specify the group with `groupName`.
 *  To clear, set `groupName` to an empty string. |
| `singleLineTextFields` | `?list<[JiraSingleLineTextField](/src/Schema/JiraSingleLineTextField.php)>` | Add or clear a single line text field:

 *  To add, provide the `text` value.
 *  To clear, set `text` to an empty string. |
| `singleSelectClearableUserPickerFields` | `?list<[JiraSingleSelectUserPickerField](/src/Schema/JiraSingleSelectUserPickerField.php)>` | Edit assignment for single select user picker fields like Assignee/Reporter:

 *  To assign an issue, specify the user's `accountId`.
 *  To unassign an issue, set `user` to `null`.
 *  For automatic assignment, set `accountId` to `-1`. |
| `singleSelectFields` | `?list<[JiraSingleSelectField](/src/Schema/JiraSingleSelectField.php)>` | Add or clear a single select field:

 *  To add, specify the option with an `optionId`.
 *  To clear, pass an option with `optionId` as `-1`. |
| `singleVersionPickerFields` | `?list<[JiraSingleVersionPickerField](/src/Schema/JiraSingleVersionPickerField.php)>` | Add or clear a single version picker field:

 *  To add, specify the version with a `versionId`.
 *  To clear, set `versionId` to `-1`. |
| `timeTrackingField` | `JiraTimeTrackingField` | Edit the time tracking field. |
| `urlFields` | `?list<[JiraUrlField](/src/Schema/JiraUrlField.php)>` | Add or clear a URL field:

 *  To add, provide the `url` with the desired URL value.
 *  To clear, set `url` to an empty string. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueBulkEditPayload](/docs/schema/issue-bulk-edit-payload.md) |
