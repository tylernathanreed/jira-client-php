# Issue Link

Details of a link between issues.

Source: [`Jira\Client\Schema\IssueLink`](/src/Schema/IssueLink.php)

| Property | Type | Description |
| --- | --- | --- |
| `inwardIssue` | `` | Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link. |
| `outwardIssue` | `` | Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link. |
| `type` | `` | The type of link between the issues. |
| `id` | `` | The ID of the issue link. |
| `self` | `` | The URL of the issue link. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueLinks](/docs/operations/issue-links.md) | [getIssueLink](/docs/operations/issue-links.md#get-issue-link) |

### Schema

*None*
