# Page Bean Field Configuration Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationDetails`](/src/Schema/PageBeanFieldConfigurationDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FieldConfigurationDetails>`](/src/Schema/FieldConfigurationDetails.php) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFieldConfigurations](/docs/operations/issue-field-configurations.md) | [getAllFieldConfigurations](/docs/operations/issue-field-configurations.md#get-all-field-configurations) |

### Schema

*None*
