# Page Bean Issue Security Level Member

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueSecurityLevelMember`](/src/Schema/PageBeanIssueSecurityLevelMember.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<IssueSecurityLevelMember>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecurityLevel](/docs/operations/issue-security-level.md) | [getIssueSecurityLevelMembers](/docs/operations/issue-security-level.md#get-issue-security-level-members) |

### Schema

*None*
