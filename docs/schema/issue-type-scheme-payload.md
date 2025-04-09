# Issue Type Scheme Payload

The payload for creating issue type schemes

Source: [`Jira\Client\Schema\IssueTypeSchemePayload`](/src/Schema/IssueTypeSchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultIssueTypeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `description` | `string` | The description of the issue type scheme |
| `issueTypeIds` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | The issue type IDs for the issue type scheme |
| `name` | `string` | The name of the issue type scheme |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueTypeProjectCreatePayload](/docs/schema/issue-type-project-create-payload.md) |
