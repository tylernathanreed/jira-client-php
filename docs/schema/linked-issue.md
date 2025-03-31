# Linked Issue

The ID or key of a linked issue.

Source: [`Jira\Client\Schema\LinkedIssue`](/src/Schema/LinkedIssue.php)

| Property | Type | Description |
| --- | --- | --- |
| `fields` | `Fields` | The fields associated with the issue. |
| `id` | `string` | The ID of an issue. Required if `key` isn't provided. |
| `key` | `string` | The key of an issue. Required if `id` isn't provided. |
| `self` | `string` | The URL of the issue. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueLink](/docs/schema/issue-link.md) |
| [LinkIssueRequestJsonBean](/docs/schema/link-issue-request-json-bean.md) |
