# Update Project Details

Details about the project.

Source: [`Jira\Client\Schema\UpdateProjectDetails`](src/Schema/UpdateProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `assigneeType` | `string` | The default assignee when creating issues for this project. |
| `avatarId` | `int` | An integer value for the project's avatar. |
| `categoryId` | `int` | The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. To remove the project category from the project, set the value to `-1.` |
| `description` | `string` | A brief description of the project. |
| `issueSecurityScheme` | `int` | The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs. |
| `key` | `string` | Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters. |
| `lead` | `string` | This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Cannot be provided with `leadAccountId`. |
| `leadAccountId` | `string` | The account ID of the project lead. Cannot be provided with `lead`. |
| `name` | `string` | The name of the project. |
| `notificationScheme` | `int` | The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs. |
| `permissionScheme` | `int` | The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs. |
| `releasedProjectKeys` | `array` | Previous project keys to be released from the current project. Released keys must belong to the current project and not contain the current project key |
| `url` | `string` | A link to information about this project, such as project documentation |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Projects](/docs/operations/projects.md) | [updateProject](/docs/operations/projects.md#update-project) |

### Schema

*None*
