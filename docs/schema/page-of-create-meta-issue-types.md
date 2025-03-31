# Page Of Create Meta Issue Types

A page of CreateMetaIssueTypes.

Source: [`Jira\Client\Schema\PageOfCreateMetaIssueTypes`](/src/Schema/PageOfCreateMetaIssueTypes.php)

| Property | Type | Description |
| --- | --- | --- |
| `createMetaIssueType` | [`?list<IssueTypeIssueCreateMetadata>`](/docs/schemas/issue-type-issue-create-metadata.md) |  |
| `issueTypes` | [`?list<IssueTypeIssueCreateMetadata>`](/docs/schemas/issue-type-issue-create-metadata.md) | The list of CreateMetaIssueType. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The total number of items in all pages. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getCreateIssueMetaIssueTypes](/docs/operations/issues.md#get-create-issue-meta-issue-types) |

### Schema

*None*
