# Issue Type Issue Create Metadata

Details of the issue creation metadata for an issue type.

Source: [`Jira\Client\Schema\IssueTypeIssueCreateMetadata`](/src/Schema/IssueTypeIssueCreateMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `` | The ID of the issue type's avatar. |
| `description` | `` | The description of the issue type. |
| `entityId` | `` | Unique ID for next-gen projects. |
| `expand` | `` | Expand options that include additional issue type metadata details in the response. |
| `fields` | `array<string,FieldMetadata>` | List of the fields available when creating an issue for the issue type. |
| `hierarchyLevel` | `` | Hierarchy level of the issue type. |
| `iconUrl` | `` | The URL of the issue type's avatar. |
| `id` | `` | The ID of the issue type. |
| `name` | `` | The name of the issue type. |
| `scope` | `` | Details of the next-gen projects the issue type is available in. |
| `self` | `` | The URL of these issue type details. |
| `subtask` | `` | Whether this issue type is used to create subtasks. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageOfCreateMetaIssueTypes](/docs/schema/page-of-create-meta-issue-types.md) |
| [PaginatedResponseIssueTypeIssueCreateMetadata](/docs/schema/paginated-response-issue-type-issue-create-metadata.md) |
| [ProjectIssueCreateMetadata](/docs/schema/project-issue-create-metadata.md) |
