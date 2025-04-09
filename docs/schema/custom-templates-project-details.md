# Custom Templates Project Details

Project Details

Source: [`Jira\Client\Schema\CustomTemplatesProjectDetails`](/src/Schema/CustomTemplatesProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `accessLevel` | `'open'\|`<br/>`'limited'\|`<br/>`'private'\|`<br/>`'free'\|`<br/>`null` | The access level of the project. Only used by team-managed project |
| `additionalProperties` | `array<string,string>` | Additional properties of the project |
| `assigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The default assignee when creating issues in the project |
| `avatarId` | `int` | The ID of the project's avatar. Use the \[Get project avatars\](\#api-rest-api-3-project-projectIdOrKey-avatar-get) operation to list the available avatars in a project. |
| `categoryId` | `int` | The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. |
| `description` | `string` | Brief description of the project |
| `enableComponents` | `bool` | Whether components are enabled for the project. Only used by company-managed project |
| `key` | `string` | Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters. |
| `language` | `string` | The default language for the project |
| `leadAccountId` | `string` | The account ID of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `lead`. |
| `name` | `string` | Name of the project |
| `url` | `string` | A link to information about this project, such as project documentation |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [ProjectCustomTemplateCreateRequestDTO](/docs/schema/project-custom-template-create-request-dto.md) |
