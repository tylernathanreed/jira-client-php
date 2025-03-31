# Jql Function Precomputation Bean

Jql function precomputation.

Source: [`Jira\Client\Schema\JqlFunctionPrecomputationBean`](/src/Schema/JqlFunctionPrecomputationBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `arguments` | `?list<string>` | The list of arguments function was invoked with. |
| `created` | `` | The timestamp of the precomputation creation. |
| `error` | `` | The error message to be displayed to the user. |
| `field` | `` | The field the function was executed against. |
| `functionKey` | `` | The function key. |
| `functionName` | `` | The name of the function. |
| `id` | `` | The id of the precomputation. |
| `operator` | `` | The operator in context of which function was executed. |
| `updated` | `` | The timestamp of the precomputation last update. |
| `used` | `` | The timestamp of the precomputation last usage. |
| `value` | `` | The JQL fragment stored as the precomputation. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlFunctionPrecomputationGetByIdResponse](/docs/schema/jql-function-precomputation-get-by-id-response.md) |
| [PageBean2JqlFunctionPrecomputationBean](/docs/schema/page-bean2-jql-function-precomputation-bean.md) |
