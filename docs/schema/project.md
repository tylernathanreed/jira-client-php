# Project

Details about a project.

Source: [`Jira\Client\Schema\Project`](/src/Schema/Project.php)

| Property | Type | Description |
| --- | --- | --- |
| `archived` | `bool` | Whether the project is archived. |
| `archivedBy` | `User` | The user who archived the project. |
| `archivedDate` | `string` | The date when the project was archived. |
| `assigneeType` | `string` | The default assignee when creating issues for this project. |
| `avatarUrls` | `AvatarUrlsBean` | The URLs of the project's avatars. |
| `components` | `array` | List of the components contained in the project. |
| `deleted` | `bool` | Whether the project is marked as deleted. |
| `deletedBy` | `User` | The user who marked the project as deleted. |
| `deletedDate` | `string` | The date when the project was marked as deleted. |
| `description` | `string` | A brief description of the project. |
| `email` | `string` | An email address associated with the project. |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `favourite` | `bool` | Whether the project is selected as a favorite. |
| `id` | `string` | The ID of the project. |
| `insight` | `ProjectInsight` | Insights about the project. |
| `isPrivate` | `bool` | Whether the project is private from the user's perspective. This means the user can't see the project or any associated issues. |
| `issueTypeHierarchy` | `Hierarchy` | The issue type hierarchy for the project. |
| `issueTypes` | `array` | List of the issue types available in the project. |
| `key` | `string` | The key of the project. |
| `landingPageInfo` | `ProjectLandingPageInfo` | The project landing page info. |
| `lead` | `User` | The username of the project lead. |
| `name` | `string` | The name of the project. |
| `permissions` | `ProjectPermissions` | User permissions on the project |
| `projectCategory` | `ProjectCategory` | The category the project belongs to. |
| `projectTypeKey` | `string` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `properties` | `object` | Map of project properties |
| `retentionTillDate` | `string` | The date when the project is deleted permanently. |
| `roles` | `object` | The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post). |
| `self` | `string` | The URL of the project details. |
| `simplified` | `bool` | Whether the project is simplified. |
| `style` | `string` | The type of the project. |
| `url` | `string` | A link to information about this project, such as project documentation. |
| `uuid` | `string` | Unique ID for next-gen projects. |
| `versions` | `array` | The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post). |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Projects](/docs/operations/projects.md) | [getAllProjects](/docs/operations/projects.md#get-all-projects) |
| [Projects](/docs/operations/projects.md) | [getRecent](/docs/operations/projects.md#get-recent) |
| [Projects](/docs/operations/projects.md) | [getProject](/docs/operations/projects.md#get-project) |
| [Projects](/docs/operations/projects.md) | [updateProject](/docs/operations/projects.md#update-project) |
| [Projects](/docs/operations/projects.md) | [restore](/docs/operations/projects.md#restore) |

### Schema

| Group | Operation |
| --- | --- |
| [LegacyJackson1ListProject](/docs/schema/legacy-jackson1-list-project.md) |
| [PageBeanProject](/docs/schema/page-bean-project.md) |
| [SharePermission](/docs/schema/share-permission.md) |
