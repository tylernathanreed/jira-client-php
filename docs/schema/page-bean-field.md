# Page Bean Field

A page of items.

Source: [`Jira\Client\Schema\PageBeanField`](/src/Schema/PageBeanField.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Field>`](/docs/schema/field.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueFields](/docs/operations/issue-fields.md) | [getFieldsPaginated](/docs/operations/issue-fields.md#get-fields-paginated) |
| [IssueFields](/docs/operations/issue-fields.md) | [getTrashedFieldsPaginated](/docs/operations/issue-fields.md#get-trashed-fields-paginated) |

### Schema

*None*
