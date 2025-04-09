# Issue Type Project Create Payload

The payload for creating issue types in a project

Source: [`Jira\Client\Schema\IssueTypeProjectCreatePayload`](/src/Schema/IssueTypeProjectCreatePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeHierarchy` | [`?list<IssueTypeHierarchyPayload>`](/docs/schema/issue-type-hierarchy-payload.md) | Defines the issue type hierarhy to be created and used during this project creation. This will only add new levels if there isn't an existing level |
| `issueTypeScheme` | [`IssueTypeSchemePayload`](/docs/schema/issue-type-scheme-payload.md) |  |
| `issueTypes` | [`?list<IssueTypePayload>`](/docs/schema/issue-type-payload.md) | Only needed if you want to create issue types, you can otherwise use the ids of issue types in the scheme configuration |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
