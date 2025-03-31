# Changelog

A log of changes made to issue fields.
Changelogs related to workflow associations are currently being deprecated.

Source: [`Jira\Client\Schema\Changelog`](/src/Schema/Changelog.php)

| Property | Type | Description |
| --- | --- | --- |
| `author` | `UserDetails` | The user who made the change. |
| `created` | `string` | The date on which the change took place. |
| `historyMetadata` | `HistoryMetadata` | The history metadata associated with the changed. |
| `id` | `string` | The ID of the changelog. |
| `items` | [`?list<ChangeDetails>`](/docs/schema/change-details.md) | The list of items changed. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueChangeLog](/docs/schema/issue-change-log.md) |
| [PageBeanChangelog](/docs/schema/page-bean-changelog.md) |
| [PageOfChangelogs](/docs/schema/page-of-changelogs.md) |
