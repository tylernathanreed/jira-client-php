# Application Roles

DummyDescription

Source: [`Jira\Client\Operations\ApplicationRoles`](/src/Operations/ApplicationRoles.php)

## Operations

- [Get All Application Roles](#getAllApplicationRoles)
- [Get Application Role](#getApplicationRole)

## Get All Application Roles
<a name="getAllApplicationRoles"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-application-roles/#api-rest-api-3-applicationrole-get

Returns all application roles.
In Jira, application roles are managed using the "Application access configuration" page

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/3YxjL
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getAllApplicationRoles();
```

### Request

#### Response


## Get Application Role
<a name="getApplicationRole"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-application-roles/#api-rest-api-3-applicationrole-key-get

Returns an application role

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ApplicationRole $response */
$response = $client->getApplicationRole(
    key: 'jira-software',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the application role. Use the [Get all application roles](#api-rest-api-3-applicationrole-get) operation to get the key for each application role. |

#### Response

Source: [`Jira\Client\Schema\ApplicationRole`](/docs/schema/application-role.md)

Details of an application role.

| Property | Type | Description |
| --- | --- | --- |
| `defaultGroups` | `?list<string>` | The groups that are granted default access for this application role. As a group's name can change, use of `defaultGroupsDetails` is recommended to identify a groups. |
| `defaultGroupsDetails` | [`?list<GroupName>`](/docs/schema/group-name.md) | The groups that are granted default access for this application role. |
| `defined` | `bool` | Deprecated. |
| `groupDetails` | [`?list<GroupName>`](/docs/schema/group-name.md) | The groups associated with the application role. |
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
