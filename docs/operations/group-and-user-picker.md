# Group And User Picker

Source: [`Jira\Client\Operations\GroupAndUserPicker`](/src/Operations/GroupAndUserPicker.php)

## Operations

- [Find Users And Groups](#findUsersAndGroups)

## Find Users And Groups
<a name="findUsersAndGroups"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-group-and-user-picker/#api-rest-api-3-groupuserpicker-get

Returns a list of users and groups matching a string.
The string is used:

 - for users, to find a case-insensitive match with display name and e-mail address.
Note that if a user has hidden their email address in their user profile, partial matches of the email address will not find the user.
An exact match is required
 - for groups, to find a case-sensitive match with group name

For example, if the string *tin* is used, records with the display name *Tina*, email address *sarah@tinplatetraining.com*, and the group *accounting* would be returned

Optionally, the search can be refined to:

 - the projects and issue types associated with a custom field, such as a user picker.
The search can then be further refined to return only users and groups that have permission to view specific:
    
     - projects
     - issue types
    
    If multiple projects or issue types are specified, they must be a subset of those enabled for the custom field or no results are returned.
For example, if a field is enabled for projects A, B, and C then the search could be limited to projects B and C.
However, if the search is limited to projects B and D, nothing is returned
 - not return Connect app users and groups
 - return groups that have a case-insensitive match with the query

The primary use case for this resource is to populate a picker field suggestion list with users or groups.
To this end, the returned object includes an `html` field for each list.
This field highlights the matched query term in the item name with the HTML strong tag.
Also, each list is wrapped in a response object that contains a header for use in a picker, specifically *Showing X of Y matching groups*

This operation can be accessed anonymously

**"Permissions" required:** *Browse users and groups* "global permission".
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\FoundUsersAndGroups $response */
$response = $client->findUsersAndGroups(
    query: 'foo',
    maxResults: 50,
    showAvatar: false,
    fieldId: null,
    projectId: null,
    issueTypeId: null,
    avatarSize: 'xsmall',
    caseInsensitive: false,
    excludeConnectAddons: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `string` | The search string. |
| `maxResults` | `?int` | The maximum number of items to return in each list. |
| `showAvatar` | `?bool` | Whether the user avatar should be returned. If an invalid value is provided, the default value is used. |
| `fieldId` | `?string` | The custom field ID of the field this request is for. |
| `projectId` | `?list<string>` | The ID of a project that returned users and groups must have permission to view. To include multiple projects, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`. This parameter is only used when `fieldId` is present. |
| `issueTypeId` | `?list<string>` | The ID of an issue type that returned users and groups must have permission to view. To include multiple issue types, provide an ampersand-separated list. For example, `issueTypeId=10000&issueTypeId=10001`. Special values, such as `-1` (all standard issue types) and `-2` (all subtask issue types), are supported. This parameter is only used when `fieldId` is present. |
| `avatarSize` | `'xsmall'\|`<br/>`'xsmall@2x'\|`<br/>`'xsmall@3x'\|`<br/>`'small'\|`<br/>`'small@2x'\|`<br/>`'small@3x'\|`<br/>`'medium'\|`<br/>`'medium@2x'\|`<br/>`'medium@3x'\|`<br/>`'large'\|`<br/>`'large@2x'\|`<br/>`'large@3x'\|`<br/>`'xlarge'\|`<br/>`'xlarge@2x'\|`<br/>`'xlarge@3x'\|`<br/>`'xxlarge'\|`<br/>`'xxlarge@2x'\|`<br/>`'xxlarge@3x'\|`<br/>`'xxxlarge'\|`<br/>`'xxxlarge@2x'\|`<br/>`'xxxlarge@3x'\|`<br/>`null` | The size of the avatar to return. If an invalid value is provided, the default value is used. |
| `caseInsensitive` | `?bool` | Whether the search for groups should be case insensitive. |
| `excludeConnectAddons` | `?bool` | Whether Connect app users and groups should be excluded from the search results. If an invalid value is provided, the default value is used. |

#### Response

Source: [`Jira\Client\Schema\FoundUsersAndGroups`](/docs/schema/found-users-and-groups.md)

List of users and groups found in a search.

| Property | Type | Description |
| --- | --- | --- |
| `groups` | [`FoundGroups`](/docs/schema/found-groups.md) |  |
| `users` | [`FoundUsers`](/docs/schema/found-users.md) |  |
