# Issue Create Metadata

The wrapper for the issue creation metadata for a list of projects.

Source: [`Jira\Client\Schema\IssueCreateMetadata`](/src/Schema/IssueCreateMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `projects` | [`?list<ProjectIssueCreateMetadata>`](/docs/schemas/project-issue-create-metadata.md) | List of projects and their issue creation metadata. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getCreateIssueMeta](/docs/operations/issues.md#get-create-issue-meta) |

### Schema

*None*
