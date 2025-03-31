# Page Bean Field Configuration Item

A page of items.

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationItem`](/src/Schema/PageBeanFieldConfigurationItem.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<FieldConfigurationItem>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFieldConfigurations](/docs/operations/issue-field-configurations.md) | [getFieldConfigurationItems](/docs/operations/issue-field-configurations.md#get-field-configuration-items) |

### Schema

*None*
