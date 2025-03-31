# Get Date Field Response


Source: [`Jira\Client\Schema\GetDateFieldResponse`](/src/Schema/GetDateFieldResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'DueDate'|'TargetStartDate'|'TargetEndDate'|'DateCustomField'` | The date field type. This is "DueDate", "TargetStartDate", "TargetEndDate" or "DateCustomField". |
| `dateCustomFieldId` | `` | A date custom field ID. This is returned if the type is "DateCustomField". |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [GetSchedulingResponse](/docs/schema/get-scheduling-response.md) |
