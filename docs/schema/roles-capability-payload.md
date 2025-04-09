# Roles Capability Payload


Source: [`Jira\Client\Schema\RolesCapabilityPayload`](/src/Schema/RolesCapabilityPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `roleToProjectActors` | [`array<string,ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | A map of role PCRI (can be ID or REF) to a list of user or group PCRI IDs to associate with the role and project. |
| `roles` | [`?list<RolePayload>`](/docs/schema/role-payload.md) | The list of roles to create. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
