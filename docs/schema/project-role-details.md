# Project Role Details

Details about a project role.

Source: [`Jira\Client\Schema\ProjectRoleDetails`](/src/Schema/ProjectRoleDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `admin` | `` | Whether this role is the admin role for the project. |
| `default` | `` | Whether this role is the default role for the project. |
| `description` | `` | The description of the project role. |
| `id` | `` | The ID of the project role. |
| `name` | `` | The name of the project role. |
| `roleConfigurable` | `` | Whether the roles are configurable for this project. |
| `scope` | `` | The scope of the role. Indicated for roles associated with [next-gen projects](https://confluence.atlassian.com/x/loMyO). |
| `self` | `` | The URL the project role details. |
| `translatedName` | `` | The translated name of the project role. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectRoles](/docs/operations/project-roles.md) | [getProjectRoleDetails](/docs/operations/project-roles.md#get-project-role-details) |

### Schema

| Group | Operation |
| --- | --- |
| [LegacyJackson1ListProjectRoleDetails](/docs/schema/legacy-jackson1-list-project-role-details.md) |
