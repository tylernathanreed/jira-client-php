# Page Bean Field Configuration Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationScheme`](/src/Schema/PageBeanFieldConfigurationScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `array` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFieldConfigurations](/docs/operations/issue-field-configurations.md) | [getAllFieldConfigurationSchemes](/docs/operations/issue-field-configurations.md#get-all-field-configuration-schemes) |

### Schema

*None*
