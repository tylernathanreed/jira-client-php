# Permission Payload DTO 

The payload to create a permission scheme

Source: [`Jira\Client\Schema\PermissionPayloadDTO`](/src/Schema/PermissionPayloadDTO.php)

| Property | Type | Description |
| --- | --- | --- |
| `addAddonRole` | `bool` | Configuration to generate addon role. Default is false if null |
| `description` | `string` | The description of the permission scheme |
| `grants` | [`?list<PermissionGrantDTO>`](/docs/schema/permission-grant-dto.md) | List of permission grants |
| `name` | `string` | The name of the permission scheme |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The strategy to use when there is a conflict with an existing permission scheme. FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters; NEW - If the entity exist, try and create a new one with a different name |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
