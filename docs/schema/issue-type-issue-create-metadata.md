# Issue Type Issue Create Metadata

Details of the issue creation metadata for an issue type.

Source: [`Jira\Client\Schema\IssueTypeIssueCreateMetadata`](/src/Schema/IssueTypeIssueCreateMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The ID of the issue type's avatar. |
| `description` | `string` | The description of the issue type. |
| `entityId` | `string` | Unique ID for next-gen projects. |
| `expand` | `string` | Expand options that include additional issue type metadata details in the response. |
| `fields` | `array<string,FieldMetadata>` | List of the fields available when creating an issue for the issue type. |
| `hierarchyLevel` | `int` | Hierarchy level of the issue type. |
| `iconUrl` | `string` | The URL of the issue type's avatar. |
| `id` | `string` | The ID of the issue type. |
| `name` | `string` | The name of the issue type. |
| `scope` | `Scope` | Details of the next-gen projects the issue type is available in. |
| `self` | `string` | The URL of these issue type details. |
| `subtask` | `bool` | Whether this issue type is used to create subtasks. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageOfCreateMetaIssueTypes](/docs/schema/page-of-create-meta-issue-types.md) |
| [PaginatedResponseIssueTypeIssueCreateMetadata](/docs/schema/paginated-response-issue-type-issue-create-metadata.md) |
| [ProjectIssueCreateMetadata](/docs/schema/project-issue-create-metadata.md) |
