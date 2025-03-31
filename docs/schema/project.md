# Project

Details about a project.

Source: [`Jira\Client\Schema\Project`](/src/Schema/Project.php)

| Property | Type | Description |
| --- | --- | --- |
| `archived` | `bool` | Whether the project is archived. |
| `archivedBy` | [`User`](/docs/schema/user.md) | The user who archived the project. |
| `archivedDate` | `string` | The date when the project was archived. |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The URLs of the project's avatars. |
| `components` | [`?list<ProjectComponent>`](/docs/schema/project-component.md) | List of the components contained in the project. |
| `deleted` | `bool` | Whether the project is marked as deleted. |
| `deletedBy` | [`User`](/docs/schema/user.md) | The user who marked the project as deleted. |
| `deletedDate` | `string` | The date when the project was marked as deleted. |
| `description` | `string` | A brief description of the project. |
| `email` | `string` | An email address associated with the project. |
| `expand` | `string` | Expand options that include additional project details in the response. |
| `favourite` | `bool` | Whether the project is selected as a favorite. |
| `id` | `string` | The ID of the project. |
| `insight` | [`ProjectInsight`](/docs/schema/project-insight.md) | Insights about the project. |
| `isPrivate` | `bool` | Whether the project is private from the user's perspective. This means the user can't see the project or any associated issues. |
| `issueTypeHierarchy` | [`Hierarchy`](/docs/schema/hierarchy.md) | The issue type hierarchy for the project. |
| `issueTypes` | [`?list<IssueTypeDetails>`](/docs/schema/issue-type-details.md) | List of the issue types available in the project. |
| `key` | `string` | The key of the project. |
| `landingPageInfo` | [`ProjectLandingPageInfo`](/docs/schema/project-landing-page-info.md) | The project landing page info. |
| `lead` | [`User`](/docs/schema/user.md) | The username of the project lead. |
| `name` | `string` | The name of the project. |
| `permissions` | [`ProjectPermissions`](/docs/schema/project-permissions.md) | User permissions on the project |
| `projectCategory` | [`ProjectCategory`](/docs/schema/project-category.md) | The category the project belongs to. |
| `projectTypeKey` | `'software'\|'service_desk'\|'business'\|null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project. |
| `properties` | `array<string,mixed>` | Map of project properties |
| `retentionTillDate` | `string` | The date when the project is deleted permanently. |
| `roles` | `array<string,string>` | The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post). |
| `self` | `string` | The URL of the project details. |
| `simplified` | `bool` | Whether the project is simplified. |
| `style` | `'classic'\|'next-gen'\|null` | The type of the project. |
| `url` | `string` | A link to information about this project, such as project documentation. |
| `uuid` | `string` | Unique ID for next-gen projects. |
| `versions` | [`?list<Version>`](/docs/schema/version.md) | The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post). |

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

| Schema |
| --- |
| [LegacyJackson1ListProject](/docs/schema/legacy-jackson1-list-project.md) |
| [PageBeanProject](/docs/schema/page-bean-project.md) |
| [SharePermission](/docs/schema/share-permission.md) |
