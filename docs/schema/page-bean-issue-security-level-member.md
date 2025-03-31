# Page Bean Issue Security Level Member

A page of items.

Source: [`Jira\Client\Schema\PageBeanIssueSecurityLevelMember`](/src/Schema/PageBeanIssueSecurityLevelMember.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueSecurityLevelMember>`](/docs/schemas/issue-security-level-member.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecurityLevel](/docs/operations/issue-security-level.md) | [getIssueSecurityLevelMembers](/docs/operations/issue-security-level.md#get-issue-security-level-members) |

### Schema

*None*
