# Create Update Role Request Bean


Source: [`Jira\Client\Schema\CreateUpdateRoleRequestBean`](/src/Schema/CreateUpdateRoleRequestBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | A description of the project role. Required when fully updating a project role. Optional when creating or partially updating a project role. |
| `name` | `string` | The name of the project role. Must be unique. Cannot begin or end with whitespace. The maximum length is 255 characters. Required when creating a project role. Optional when partially updating a project role. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectRoles](/docs/operations/project-roles.md) | [createProjectRole](/docs/operations/project-roles.md#create-project-role) |
| [ProjectRoles](/docs/operations/project-roles.md) | [fullyUpdateProjectRole](/docs/operations/project-roles.md#fully-update-project-role) |
| [ProjectRoles](/docs/operations/project-roles.md) | [partialUpdateProjectRole](/docs/operations/project-roles.md#partial-update-project-role) |

### Schema

*None*
