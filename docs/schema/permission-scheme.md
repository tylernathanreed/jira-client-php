# Permission Scheme

Details of a permission scheme.

Source: [`Jira\Client\Schema\PermissionScheme`](/src/Schema/PermissionScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The name of the permission scheme. Must be unique. |
| `description` | `` | A description for the permission scheme. |
| `expand` | `` | The expand options available for the permission scheme. |
| `id` | `` | The ID of the permission scheme. |
| `permissions` | `?list<PermissionGrant>` | The permission scheme to create or update. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more information. |
| `scope` | `` | The scope of the permission scheme. |
| `self` | `` | The URL of the permission scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [PermissionSchemes](/docs/operations/permission-schemes.md) | [createPermissionScheme](/docs/operations/permission-schemes.md#create-permission-scheme) |
| [PermissionSchemes](/docs/operations/permission-schemes.md) | [getPermissionScheme](/docs/operations/permission-schemes.md#get-permission-scheme) |
| [PermissionSchemes](/docs/operations/permission-schemes.md) | [updatePermissionScheme](/docs/operations/permission-schemes.md#update-permission-scheme) |
| [ProjectPermissionSchemes](/docs/operations/project-permission-schemes.md) | [getAssignedPermissionScheme](/docs/operations/project-permission-schemes.md#get-assigned-permission-scheme) |
| [ProjectPermissionSchemes](/docs/operations/project-permission-schemes.md) | [assignPermissionScheme](/docs/operations/project-permission-schemes.md#assign-permission-scheme) |

### Schema

| Group | Operation |
| --- | --- |
| [PermissionSchemes](/docs/schema/permission-schemes.md) |
