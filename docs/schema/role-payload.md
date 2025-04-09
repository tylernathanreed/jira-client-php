# Role Payload

The payload used to create a project role.
It is optional for CMP projects, as a default role actor will be provided.
TMP will add new role actors to the table.

Source: [`Jira\Client\Schema\RolePayload`](/src/Schema/RolePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultActors` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | The default actors for the role. By adding default actors, the role will be added to any future projects created |
| `description` | `string` | The description of the role |
| `name` | `string` | The name of the role |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The strategy to use when there is a conflict with an existing project role. FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `type` | `'HIDDEN'\|'VIEWABLE'\|'EDITABLE'\|null` | The type of the role. Only used by project-scoped project |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [RolesCapabilityPayload](/docs/schema/roles-capability-payload.md) |
