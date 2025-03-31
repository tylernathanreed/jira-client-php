# Project Details

Details about a project.

Source: [`Jira\Client\Schema\ProjectDetails`](/src/Schema/ProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarUrls` | `AvatarUrlsBean` | The URLs of the project's avatars. |
| `id` | `string` | The ID of the project. |
| `key` | `string` | The key of the project. |
| `name` | `string` | The name of the project. |
| `projectCategory` | `UpdatedProjectCategory` | The category the project belongs to. |
| `projectTypeKey` | `string` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `self` | `string` | The URL of the project details. |
| `simplified` | `bool` | Whether or not the project is simplified. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanProjectDetails](/docs/schema/page-bean-project-details.md) |
| [Scope](/docs/schema/scope.md) |
| [Workflow](/docs/schema/workflow.md) |
