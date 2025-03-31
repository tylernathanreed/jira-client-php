# Issue Type Create Bean


Source: [`Jira\Client\Schema\IssueTypeCreateBean`](/src/Schema/IssueTypeCreateBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The unique name for the issue type. The maximum length is 60 characters. |
| `description` | `` | The description of the issue type. |
| `hierarchyLevel` | `` | The hierarchy level of the issue type. Use:

 *  `-1` for Subtask.
 *  `0` for Base.

Defaults to `0`. |
| `type` | `'subtask'|'standard'|null` | Deprecated. Use `hierarchyLevel` instead. See the [deprecation notice](https://community.developer.atlassian.com/t/deprecation-of-the-epic-link-parent-link-and-other-related-fields-in-rest-apis-and-webhooks/54048) for details.

Whether the issue type is `subtype` or `standard`. Defaults to `standard`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypes](/docs/operations/issue-types.md) | [createIssueType](/docs/operations/issue-types.md#create-issue-type) |

### Schema

*None*
