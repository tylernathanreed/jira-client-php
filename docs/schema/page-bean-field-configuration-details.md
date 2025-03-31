# Page Bean Field Configuration Details

A page of items.

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationDetails`](/src/Schema/PageBeanFieldConfigurationDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<FieldConfigurationDetails>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFieldConfigurations](/docs/operations/issue-field-configurations.md) | [getAllFieldConfigurations](/docs/operations/issue-field-configurations.md#get-all-field-configurations) |

### Schema

*None*
