# Update Custom Field Details

Details of a custom field.

Source: [`Jira\Client\Schema\UpdateCustomFieldDetails`](/src/Schema/UpdateCustomFieldDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the custom field. The maximum length is 40000 characters. |
| `name` | `string` | The name of the custom field. It doesn't have to be unique. The maximum length is 255 characters. |
| `searcherKey` | `'com.atlassian.jira.plugin.system.customfieldtypes:cascadingselectsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:daterange'\|'com.atlassian.jira.plugin.system.customfieldtypes:datetimerange'\|'com.atlassian.jira.plugin.system.customfieldtypes:exactnumber'\|'com.atlassian.jira.plugin.system.customfieldtypes:exacttextsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:labelsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:multiselectsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:numberrange'\|'com.atlassian.jira.plugin.system.customfieldtypes:projectsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:textsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:userpickergroupsearcher'\|'com.atlassian.jira.plugin.system.customfieldtypes:versionsearcher'\|null` | The searcher that defines the way the field is searched in Jira. It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):<br/><br/> *  `cascadingselect`: `cascadingselectsearcher`<br/> *  `datepicker`: `daterange`<br/> *  `datetime`: `datetimerange`<br/> *  `float`: `exactnumber` or `numberrange`<br/> *  `grouppicker`: `grouppickersearcher`<br/> *  `importid`: `exactnumber` or `numberrange`<br/> *  `labels`: `labelsearcher`<br/> *  `multicheckboxes`: `multiselectsearcher`<br/> *  `multigrouppicker`: `multiselectsearcher`<br/> *  `multiselect`: `multiselectsearcher`<br/> *  `multiuserpicker`: `userpickergroupsearcher`<br/> *  `multiversion`: `versionsearcher`<br/> *  `project`: `projectsearcher`<br/> *  `radiobuttons`: `multiselectsearcher`<br/> *  `readonlyfield`: `textsearcher`<br/> *  `select`: `multiselectsearcher`<br/> *  `textarea`: `textsearcher`<br/> *  `textfield`: `textsearcher`<br/> *  `url`: `exacttextsearcher`<br/> *  `userpicker`: `userpickergroupsearcher`<br/> *  `version`: `versionsearcher` |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFields](/docs/operations/issue-fields.md) | [updateCustomField](/docs/operations/issue-fields.md#update-custom-field) |

### Schema

*None*
