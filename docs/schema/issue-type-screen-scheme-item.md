# Issue Type Screen Scheme Item

The screen scheme for an issue type.

Source: [`Jira\Client\Schema\IssueTypeScreenSchemeItem`](/src/Schema/IssueTypeScreenSchemeItem.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided. |
| `issueTypeScreenSchemeId` | `string` | The ID of the issue type screen scheme. |
| `screenSchemeId` | `string` | The ID of the screen scheme. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanIssueTypeScreenSchemeItem](/docs/schema/page-bean-issue-type-screen-scheme-item.md) |
