# Version Related Work

Associated related work to a version

Source: [`Jira\Client\Schema\VersionRelatedWork`](/src/Schema/VersionRelatedWork.php)

| Property | Type | Description |
| --- | --- | --- |
| `category` | `` | The category of the related work |
| `issueId` | `` | The ID of the issue associated with the related work (if there is one). Cannot be updated via the Rest API. |
| `relatedWorkId` | `` | The id of the related work. For the native release note related work item, this will be null, and Rest API does not support updating it. |
| `title` | `` | The title of the related work |
| `url` | `` | The URL of the related work. Will be null for the native release note related work item, but is otherwise required. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [getRelatedWork](/docs/operations/project-versions.md#get-related-work) |
| [ProjectVersions](/docs/operations/project-versions.md) | [updateRelatedWork](/docs/operations/project-versions.md#update-related-work) |
| [ProjectVersions](/docs/operations/project-versions.md) | [createRelatedWork](/docs/operations/project-versions.md#create-related-work) |

### Schema

*None*
