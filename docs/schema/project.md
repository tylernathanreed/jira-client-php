# Project

Details about a project.

Source: [`Jira\Client\Schema\Project`](/src/Schema/Project.php)

| Property | Type | Description |
| --- | --- | --- |
| `archived` | `` | Whether the project is archived. |
| `archivedBy` | `` | The user who archived the project. |
| `archivedDate` | `` | The date when the project was archived. |
| `assigneeType` | `'PROJECT_LEAD'|'UNASSIGNED'|null` | The default assignee when creating issues for this project. |
| `avatarUrls` | `` | The URLs of the project's avatars. |
| `components` | `?list<ProjectComponent>` | List of the components contained in the project. |
| `deleted` | `` | Whether the project is marked as deleted. |
| `deletedBy` | `` | The user who marked the project as deleted. |
| `deletedDate` | `` | The date when the project was marked as deleted. |
| `description` | `` | A brief description of the project. |
| `email` | `` | An email address associated with the project. |
| `expand` | `` | Expand options that include additional project details in the response. |
| `favourite` | `` | Whether the project is selected as a favorite. |
| `id` | `` | The ID of the project. |
| `insight` | `` | Insights about the project. |
| `isPrivate` | `` | Whether the project is private from the user's perspective. This means the user can't see the project or any associated issues. |
| `issueTypeHierarchy` | `` | The issue type hierarchy for the project. |
| `issueTypes` | `?list<IssueTypeDetails>` | List of the issue types available in the project. |
| `key` | `` | The key of the project. |
| `landingPageInfo` | `` | The project landing page info. |
| `lead` | `` | The username of the project lead. |
| `name` | `` | The name of the project. |
| `permissions` | `` | User permissions on the project |
| `projectCategory` | `` | The category the project belongs to. |
| `projectTypeKey` | `'software'|'service_desk'|'business'|null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `properties` | `array<string,mixed>` | Map of project properties |
| `retentionTillDate` | `` | The date when the project is deleted permanently. |
| `roles` | `array<string,string>` | The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post). |
| `self` | `` | The URL of the project details. |
| `simplified` | `` | Whether the project is simplified. |
| `style` | `'classic'|'next-gen'|null` | The type of the project. |
| `url` | `` | A link to information about this project, such as project documentation. |
| `uuid` | `` | Unique ID for next-gen projects. |
| `versions` | `?list<Version>` | The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post). |

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
