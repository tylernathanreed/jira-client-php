# Page Bean Bulk Contextual Configuration

A page of items.

Source: [`Jira\Client\Schema\PageBeanBulkContextualConfiguration`](/src/Schema/PageBeanBulkContextualConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<BulkContextualConfiguration>`](/docs/schemas/bulk-contextual-configuration.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldConfigurationApps](/docs/operations/issue-custom-field-configuration-apps.md) | [getCustomFieldsConfigurations](/docs/operations/issue-custom-field-configuration-apps.md#get-custom-fields-configurations) |

### Schema

*None*
