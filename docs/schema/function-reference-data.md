# Function Reference Data

Details of functions that can be used in advanced searches.

Source: [`Jira\Client\Schema\FunctionReferenceData`](/src/Schema/FunctionReferenceData.php)

| Property | Type | Description |
| --- | --- | --- |
| `displayName` | `string` | The display name of the function. |
| `isList` | `'true'\|'false'\|null` | Whether the function can take a list of arguments. |
| `supportsListAndSingleValueOperators` | `'true'\|'false'\|null` | Whether the function supports both single and list value operators. |
| `types` | `?list<string>` | The data types returned by the function. |
| `value` | `string` | The function identifier. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [JQLReferenceData](/docs/schema/j-q-l-reference-data.md) |
