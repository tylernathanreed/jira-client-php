# Project Issue Create Metadata

Details of the issue creation metadata for a project.

Source: [`Jira\Client\Schema\ProjectIssueCreateMetadata`](/src/Schema/ProjectIssueCreateMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarUrls` | `AvatarUrlsBean` | List of the project's avatars, returning the avatar size and associated URL. |
| `expand` | `string` | Expand options that include additional project issue create metadata details in the response. |
| `id` | `string` | The ID of the project. |
| `issuetypes` | `?list<IssueTypeIssueCreateMetadata>` | List of the issue types supported by the project. |
| `key` | `string` | The key of the project. |
| `name` | `string` | The name of the project. |
| `self` | `string` | The URL of the project. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueCreateMetadata](/docs/schema/issue-create-metadata.md) |
