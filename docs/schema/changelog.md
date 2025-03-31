# Changelog

A log of changes made to issue fields.
Changelogs related to workflow associations are currently being deprecated.

Source: [`Jira\Client\Schema\Changelog`](/src/Schema/Changelog.php)

| Property | Type | Description |
| --- | --- | --- |
| `author` | `` | The user who made the change. |
| `created` | `` | The date on which the change took place. |
| `historyMetadata` | `` | The history metadata associated with the changed. |
| `id` | `` | The ID of the changelog. |
| `items` | `?list<ChangeDetails>` | The list of items changed. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueChangeLog](/docs/schema/issue-change-log.md) |
| [PageBeanChangelog](/docs/schema/page-bean-changelog.md) |
| [PageOfChangelogs](/docs/schema/page-of-changelogs.md) |
