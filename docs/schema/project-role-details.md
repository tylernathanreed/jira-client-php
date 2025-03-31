# Project Role Details

Details about a project role.

Source: [`Jira\Client\Schema\ProjectRoleDetails`](/src/Schema/ProjectRoleDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `admin` | `bool` | Whether this role is the admin role for the project. |
| `default` | `bool` | Whether this role is the default role for the project. |
| `description` | `string` | The description of the project role. |
| `id` | `int` | The ID of the project role. |
| `name` | `string` | The name of the project role. |
| `roleConfigurable` | `bool` | Whether the roles are configurable for this project. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `string` | The URL the project role details. |
| `translatedName` | `string` | The translated name of the project role. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectRoles](/docs/operations/project-roles.md) | [getProjectRoleDetails](/docs/operations/project-roles.md#get-project-role-details) |

### Schema

| Schema |
| --- |
| [LegacyJackson1ListProjectRoleDetails](/docs/schema/legacy-jackson1-list-project-role-details.md) |
