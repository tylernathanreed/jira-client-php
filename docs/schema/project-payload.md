# Project Payload

The payload for creating a project

Source: [`Jira\Client\Schema\ProjectPayload`](/src/Schema/ProjectPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `fieldLayoutSchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `issueSecuritySchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `issueTypeSchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `issueTypeScreenSchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `notificationSchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `permissionSchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `projectTypeKey` | `'software'\|`<br/>`'business'\|`<br/>`'service_desk'\|`<br/>`'product_discovery'\|`<br/>`null` | The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes), which defines the application-specific feature set. If you don't specify the project template you have to specify the project type. |
| `workflowSchemeId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
