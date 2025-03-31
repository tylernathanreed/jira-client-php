# Page Bean Issue Security Scheme To Project Mapping

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueSecuritySchemeToProjectMapping`](/src/Schema/PageBeanIssueSecuritySchemeToProjectMapping.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[IssueSecuritySchemeToProjectMapping](/src/Schema/IssueSecuritySchemeToProjectMapping.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [searchProjectsUsingSecuritySchemes](/docs/operations/issue-security-schemes.md#search-projects-using-security-schemes) |

### Schema

*None*
