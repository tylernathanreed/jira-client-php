# Function Reference Data

Details of functions that can be used in advanced searches.

Source: [`Jira\Client\Schema\FunctionReferenceData`](/src/Schema/FunctionReferenceData.php)

| Property | Type | Description |
| --- | --- | --- |
| `displayName` | `` | The display name of the function. |
| `isList` | `'true'|'false'|null` | Whether the function can take a list of arguments. |
| `supportsListAndSingleValueOperators` | `'true'|'false'|null` | Whether the function supports both single and list value operators. |
| `types` | `?list<string>` | The data types returned by the function. |
| `value` | `` | The function identifier. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JQLReferenceData](/docs/schema/j-q-l-reference-data.md) |
