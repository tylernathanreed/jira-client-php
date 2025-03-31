# Page Bean2 Jql Function Precomputation Bean

A page of items.

Source: [`Jira\Client\Schema\PageBean2JqlFunctionPrecomputationBean`](/src/Schema/PageBean2JqlFunctionPrecomputationBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<JqlFunctionPrecomputationBean>`](/docs/schema/jql-function-precomputation-bean.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JQLFunctionsApps](/docs/operations/j-q-l-functions-apps.md) | [getPrecomputations](/docs/operations/j-q-l-functions-apps.md#get-precomputations) |

### Schema

*None*
