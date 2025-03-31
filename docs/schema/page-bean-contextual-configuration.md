# Page Bean Contextual Configuration

A page of items.

Source: [`Jira\Client\Schema\PageBeanContextualConfiguration`](/src/Schema/PageBeanContextualConfiguration.php)

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
| [IssueCustomFieldConfigurationApps](/docs/operations/issue-custom-field-configuration-apps.md) | [getCustomFieldConfiguration](/docs/operations/issue-custom-field-configuration-apps.md#get-custom-field-configuration) |

### Schema

*None*
