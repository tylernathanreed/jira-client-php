# Create Project Details

Details about the project.

Source: [`Jira\Client\Schema\CreateProjectDetails`](/src/Schema/CreateProjectDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters. |
| `name` | `string` | The name of the project. |
| `assigneeType` | `'PROJECT_LEAD'\|'UNASSIGNED'\|null` | The default assignee when creating issues for this project. |
| `avatarId` | `int` | An integer value for the project's avatar. |
| `categoryId` | `int` | The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. |
| `description` | `string` | A brief description of the project. |
| `fieldConfigurationScheme` | `int` | The ID of the field configuration scheme for the project. Use the [Get all field configuration schemes](#api-rest-api-3-fieldconfigurationscheme-get) operation to get a list of field configuration scheme IDs. If you specify the field configuration scheme you cannot specify the project template key. |
| `issueSecurityScheme` | `int` | The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs. |
| `issueTypeScheme` | `int` | The ID of the issue type scheme for the project. Use the [Get all issue type schemes](#api-rest-api-3-issuetypescheme-get) operation to get a list of issue type scheme IDs. If you specify the issue type scheme you cannot specify the project template key. |
| `issueTypeScreenScheme` | `int` | The ID of the issue type screen scheme for the project. Use the [Get all issue type screen schemes](#api-rest-api-3-issuetypescreenscheme-get) operation to get a list of issue type screen scheme IDs. If you specify the issue type screen scheme you cannot specify the project template key. |
| `lead` | `string` | This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `leadAccountId`. |
| `leadAccountId` | `string` | The account ID of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `lead`. |
| `notificationScheme` | `int` | The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs. |
| `permissionScheme` | `int` | The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs. |
| `projectTemplateKey` | `'com.pyxis.greenhopper.jira:gh-simplified-agility-kanban'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-agility-scrum'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-basic'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-kanban-classic'\|`<br/>`'com.pyxis.greenhopper.jira:gh-simplified-scrum-classic'\|`<br/>`'com.pyxis.greenhopper.jira:gh-cross-team-template'\|`<br/>`'com.pyxis.greenhopper.jira:gh-cross-team-planning-template'\|`<br/>`'com.atlassian.servicedesk:simplified-it-service-management'\|`<br/>`'com.atlassian.servicedesk:simplified-it-service-management-basic'\|`<br/>`'com.atlassian.servicedesk:simplified-it-service-management-operations'\|`<br/>`'com.atlassian.servicedesk:simplified-general-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-general-service-desk-it'\|`<br/>`'com.atlassian.servicedesk:simplified-general-service-desk-business'\|`<br/>`'com.atlassian.servicedesk:simplified-internal-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-external-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-hr-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-facilities-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-legal-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-marketing-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-finance-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-analytics-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-design-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-sales-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-halp-service-desk'\|`<br/>`'com.atlassian.servicedesk:simplified-blank-project-it'\|`<br/>`'com.atlassian.servicedesk:simplified-blank-project-business'\|`<br/>`'com.atlassian.servicedesk:next-gen-it-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-hr-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-legal-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-marketing-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-facilities-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-general-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-general-it-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-general-business-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-analytics-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-finance-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-design-service-desk'\|`<br/>`'com.atlassian.servicedesk:next-gen-sales-service-desk'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-content-management'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-process-control'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-procurement'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-project-management'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment'\|`<br/>`'com.atlassian.jira-core-project-templates:jira-core-simplified-task-'\|`<br/>`null` | A predefined configuration for a project. The type of the `projectTemplateKey` must match with the type of the `projectTypeKey`. |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes), which defines the application-specific feature set. If you don't specify the project template you have to specify the project type. |
| `url` | `string` | A link to information about this project, such as project documentation |
| `workflowScheme` | `int` | The ID of the workflow scheme for the project. Use the [Get all workflow schemes](#api-rest-api-3-workflowscheme-get) operation to get a list of workflow scheme IDs. If you specify the workflow scheme you cannot specify the project template key. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Projects](/docs/operations/projects.md) | [createProject](/docs/operations/projects.md#create-project) |

### Schema

*None*
