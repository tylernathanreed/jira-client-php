# Issue Update Details

Details of an issue update request.

Source: [`Jira\Client\Schema\IssueUpdateDetails`](/src/Schema/IssueUpdateDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `fields` | `array<string,mixed>` | List of issue screen fields to update, specifying the sub-field to update and its value for each field. This field provides a straightforward option when setting a sub-field. When multiple sub-fields or other operations are required, use `update`. Fields included in here cannot be included in `update`. |
| `historyMetadata` | [`HistoryMetadata`](/docs/schema/history-metadata.md) | Additional issue history details. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | Details of issue properties to be add or update. |
| `transition` | [`IssueTransition`](/docs/schema/issue-transition.md) | Details of a transition. Required when performing a transition, optional when creating or editing an issue. |
| `update` | `array<string,FieldUpdateOperation>` | A Map containing the field field name and a list of operations to perform on the issue screen field. Note that fields included in here cannot be included in `fields`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [createIssue](/docs/operations/issues.md#create-issue) |
| [Issues](/docs/operations/issues.md) | [editIssue](/docs/operations/issues.md#edit-issue) |
| [Issues](/docs/operations/issues.md) | [doTransition](/docs/operations/issues.md#do-transition) |

### Schema

| Schema |
| --- |
| [IssuesUpdateBean](/docs/schema/issues-update-bean.md) |
