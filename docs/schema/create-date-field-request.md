# Create Date Field Request


Source: [`Jira\Client\Schema\CreateDateFieldRequest`](/src/Schema/CreateDateFieldRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'DueDate'\|`<br/>`'TargetStartDate'\|`<br/>`'TargetEndDate'\|`<br/>`'DateCustomField'` | The date field type. This must be "DueDate", "TargetStartDate", "TargetEndDate" or "DateCustomField". |
| `dateCustomFieldId` | `int` | A date custom field ID. This is required if the type is "DateCustomField". |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CreateSchedulingRequest](/docs/schema/create-scheduling-request.md) |
