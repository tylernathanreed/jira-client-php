# Project Create Resource Identifier

Every project-created entity has an ID that must be unique within the scope of the project creation.
PCRI (Project Create Resource Identifier) is a standard format for creating IDs and references to other project entities.
PCRI format is defined as follows: pcri:\[entityType\]:\[type\]:\[entityId\] entityType - the type of an entity, e.g.
status, role, workflow type - PCRI type, either `id` - The ID of an entity that already exists in the target site, or `ref` - A unique reference to an entity that is being created entityId - entity identifier, if type is `id` - must be an existing entity ID that exists in the Jira site, if `ref` - must be unique across all entities in the scope of this project template creation

Source: [`Jira\Client\Schema\ProjectCreateResourceIdentifier`](/src/Schema/ProjectCreateResourceIdentifier.php)

| Property | Type | Description |
| --- | --- | --- |
| `anID` | `bool` |  |
| `areference` | `bool` |  |
| `entityId` | `string` |  |
| `entityType` | `string` |  |
| `id` | `string` |  |
| `type` | `'id'\|'ref'\|null` |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [BoardColumnPayload](/docs/schema/board-column-payload.md) |
| [BoardPayload](/docs/schema/board-payload.md) |
| [CustomFieldPayload](/docs/schema/custom-field-payload.md) |
| [FieldLayoutConfiguration](/docs/schema/field-layout-configuration.md) |
| [FieldLayoutPayload](/docs/schema/field-layout-payload.md) |
| [FieldLayoutSchemePayload](/docs/schema/field-layout-scheme-payload.md) |
| [FromLayoutPayload](/docs/schema/from-layout-payload.md) |
| [IssueLayouItemtPayload](/docs/schema/issue-layou-itemt-payload.md) |
| [IssueLayoutPayload](/docs/schema/issue-layout-payload.md) |
| [IssueTypeHierarchyPayload](/docs/schema/issue-type-hierarchy-payload.md) |
| [IssueTypePayload](/docs/schema/issue-type-payload.md) |
| [IssueTypeSchemePayload](/docs/schema/issue-type-scheme-payload.md) |
| [IssueTypeScreenSchemePayload](/docs/schema/issue-type-screen-scheme-payload.md) |
| [NotificationSchemePayload](/docs/schema/notification-scheme-payload.md) |
| [PermissionGrantDTO](/docs/schema/permission-grant-dto.md) |
| [PermissionPayloadDTO](/docs/schema/permission-payload-dto.md) |
| [ProjectPayload](/docs/schema/project-payload.md) |
| [RolePayload](/docs/schema/role-payload.md) |
| [RolesCapabilityPayload](/docs/schema/roles-capability-payload.md) |
| [ScreenPayload](/docs/schema/screen-payload.md) |
| [ScreenSchemePayload](/docs/schema/screen-scheme-payload.md) |
| [SecuritySchemePayload](/docs/schema/security-scheme-payload.md) |
| [StatusPayload](/docs/schema/status-payload.md) |
| [TabPayload](/docs/schema/tab-payload.md) |
| [ToLayoutPayload](/docs/schema/to-layout-payload.md) |
| [WorkflowPayload](/docs/schema/workflow-payload.md) |
| [WorkflowSchemePayload](/docs/schema/workflow-scheme-payload.md) |
| [WorkflowStatusPayload](/docs/schema/workflow-status-payload.md) |
