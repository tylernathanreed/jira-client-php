# Jql Function Precomputation Bean

Jql function precomputation.

Source: [`Jira\Client\Schema\JqlFunctionPrecomputationBean`](/src/Schema/JqlFunctionPrecomputationBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `arguments` | `array` | The list of arguments function was invoked with. |
| `created` | `string` | The timestamp of the precomputation creation. |
| `error` | `string` | The error message to be displayed to the user. |
| `field` | `string` | The field the function was executed against. |
| `functionKey` | `string` | The function key. |
| `functionName` | `string` | The name of the function. |
| `id` | `string` | The id of the precomputation. |
| `operator` | `string` | The operator in context of which function was executed. |
| `updated` | `string` | The timestamp of the precomputation last update. |
| `used` | `string` | The timestamp of the precomputation last usage. |
| `value` | `string` | The JQL fragment stored as the precomputation. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JqlFunctionPrecomputationGetByIdResponse](/docs/schema/jql-function-precomputation-get-by-id-response.md) |
| [PageBean2JqlFunctionPrecomputationBean](/docs/schema/page-bean2-jql-function-precomputation-bean.md) |
