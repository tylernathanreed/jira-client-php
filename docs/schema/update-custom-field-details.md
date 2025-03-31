# Update Custom Field Details

Details of a custom field.

Source: [`Jira\Client\Schema\UpdateCustomFieldDetails`](/src/Schema/UpdateCustomFieldDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the custom field. The maximum length is 40000 characters. |
| `name` | `string` | The name of the custom field. It doesn't have to be unique. The maximum length is 255 characters. |
| `searcherKey` | `string` | The searcher that defines the way the field is searched in Jira. It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):

 *  `cascadingselect`: `cascadingselectsearcher`
 *  `datepicker`: `daterange`
 *  `datetime`: `datetimerange`
 *  `float`: `exactnumber` or `numberrange`
 *  `grouppicker`: `grouppickersearcher`
 *  `importid`: `exactnumber` or `numberrange`
 *  `labels`: `labelsearcher`
 *  `multicheckboxes`: `multiselectsearcher`
 *  `multigrouppicker`: `multiselectsearcher`
 *  `multiselect`: `multiselectsearcher`
 *  `multiuserpicker`: `userpickergroupsearcher`
 *  `multiversion`: `versionsearcher`
 *  `project`: `projectsearcher`
 *  `radiobuttons`: `multiselectsearcher`
 *  `readonlyfield`: `textsearcher`
 *  `select`: `multiselectsearcher`
 *  `textarea`: `textsearcher`
 *  `textfield`: `textsearcher`
 *  `url`: `exacttextsearcher`
 *  `userpicker`: `userpickergroupsearcher`
 *  `version`: `versionsearcher` |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFields](/docs/operations/issue-fields.md) | [updateCustomField](/docs/operations/issue-fields.md#update-custom-field) |

### Schema

*None*
