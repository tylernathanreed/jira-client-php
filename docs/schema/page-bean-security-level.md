# Page Bean Security Level

A page of items.

Source: [`Jira\Client\Schema\PageBeanSecurityLevel`](/src/Schema/PageBeanSecurityLevel.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<SecurityLevel>`](/docs/schema/security-level.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [getSecurityLevels](/docs/operations/issue-security-schemes.md#get-security-levels) |

### Schema

*None*
