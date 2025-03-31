# Page Bean Security Level Member

A page of items.

Source: [`Jira\Client\Schema\PageBeanSecurityLevelMember`](/src/Schema/PageBeanSecurityLevelMember.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<SecurityLevelMember>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [getSecurityLevelMembers](/docs/operations/issue-security-schemes.md#get-security-level-members) |

### Schema

*None*
