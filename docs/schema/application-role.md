# Application Role

Details of an application role.

Source: [`Jira\Client\Schema\ApplicationRole`](/src/Schema/ApplicationRole.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultGroups` | `?list<string>` | The groups that are granted default access for this application role. As a group's name can change, use of `defaultGroupsDetails` is recommended to identify a groups. |
| `defaultGroupsDetails` | `?list<[GroupName](/src/Schema/GroupName.php)>` | The groups that are granted default access for this application role. |
| `defined` | `bool` | Deprecated. |
| `groupDetails` | `?list<[GroupName](/src/Schema/GroupName.php)>` | The groups associated with the application role. |
| `groups` | `?list<string>` | The groups associated with the application role. As a group's name can change, use of `groupDetails` is recommended to identify a groups. |
| `hasUnlimitedSeats` | `bool` |  |
| `key` | `string` | The key of the application role. |
| `name` | `string` | The display name of the application role. |
| `numberOfSeats` | `int` | The maximum count of users on your license. |
| `platform` | `bool` | Indicates if the application role belongs to Jira platform (`jira-core`). |
| `remainingSeats` | `int` | The count of users remaining on your license. |
| `selectedByDefault` | `bool` | Determines whether this application role should be selected by default on user creation. |
| `userCount` | `int` | The number of users counting against your license. |
| `userCountDescription` | `string` | The [type of users](https://confluence.atlassian.com/x/lRW3Ng) being counted against your license. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ApplicationRoles](/docs/operations/application-roles.md) | [getAllApplicationRoles](/docs/operations/application-roles.md#get-all-application-roles) |
| [ApplicationRoles](/docs/operations/application-roles.md) | [getApplicationRole](/docs/operations/application-roles.md#get-application-role) |

### Schema

| Group | Operation |
| --- | --- |
| [SimpleListWrapperApplicationRole](/docs/schema/simple-list-wrapper-application-role.md) |
