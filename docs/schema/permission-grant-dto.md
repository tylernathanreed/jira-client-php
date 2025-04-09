# Permission Grant DTO 

List of permission grants

Source: [`Jira\Client\Schema\PermissionGrantDTO`](/src/Schema/PermissionGrantDTO.php)

| Property | Type | Description |
| --- | --- | --- |
| `applicationAccess` | `?list<string>` |  |
| `groupCustomFields` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) |  |
| `groups` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) |  |
| `permissionKeys` | `?list<string>` |  |
| `projectRoles` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) |  |
| `specialGrants` | `?list<string>` |  |
| `userCustomFields` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) |  |
| `users` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [PermissionPayloadDTO](/docs/schema/permission-payload-dto.md) |
