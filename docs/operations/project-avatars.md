# Project Avatars

DummyDescription

Source: [`Jira\Client\Operations\ProjectAvatars`](/src/Operations/ProjectAvatars.php)

## Operations

- [Set Project Avatar](#updateProjectAvatar)
- [Delete Project Avatar](#deleteProjectAvatar)
- [Load Project Avatar](#createProjectAvatar)
- [Get All Project Avatars](#getAllProjectAvatars)

## Set Project Avatar
<a name="updateProjectAvatar"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-avatars/#api-rest-api-3-project-project-id-or-key-avatar-put

Sets the avatar displayed for a project

Use "Load project avatar" to store avatars against the project, before using this operation to set the displayed avatar

**"Permissions" required:** *Administer projects* "project permission".
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateProjectAvatar(
    request: new Schema\Avatar(
        id: '10010',
    )
    projectIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Avatar`](/docs/schema/avatar.md)

Details of an avatar.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the avatar. |
| `fileName` | `string` | The file name of the avatar icon. Returned for system avatars. |
| `isDeletable` | `bool` | Whether the avatar can be deleted. |
| `isSelected` | `bool` | Whether the avatar is used in Jira. For example, shown as a project's avatar. |
| `isSystemAvatar` | `bool` | Whether the avatar is a system avatar. |
| `owner` | `string` | The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user. |
| `urls` | `array<string,string>` | The list of avatar icon URLs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or (case-sensitive) key of the project. |

#### Response

`true`
## Delete Project Avatar
<a name="deleteProjectAvatar"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-avatars/#api-rest-api-3-project-project-id-or-key-avatar-id-delete

Deletes a custom avatar from a project.
Note that system avatars cannot be deleted

**"Permissions" required:** *Administer projects* "project permission".
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteProjectAvatar(
    projectIdOrKey: 'foo',
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or (case-sensitive) key. |
| `id` | `int` | The ID of the avatar. |

#### Response

`true`
## Load Project Avatar
<a name="createProjectAvatar"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-avatars/#api-rest-api-3-project-project-id-or-key-avatar2-post

Loads an avatar for a project

Specify the avatar's local file location in the body of the request.
Also, include the following headers:

 - `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see "Special Headers"
 - `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG

For example:  
`curl --request POST `

`--user email@example.com:<api_token> `

`--header 'X-Atlassian-Token: no-check' `

`--header 'Content-Type: image/< image_type>' `

`--data-binary "<@/path/to/file/with/your/avatar>" `

`--url 'https://your-domain.atlassian.net/rest/api/3/project/{projectIdOrKey}/avatar2'`

The avatar is cropped to a square.
If no crop parameters are specified, the square originates at the top left of the image.
The length of the square's sides is set to the smaller of the height or width of the image

The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size

After creating the avatar use "Set project avatar" to set it as the project's displayed avatar

**"Permissions" required:** *Administer projects* "project permission".
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Avatar $response */
$response = $client->createProjectAvatar(
    projectIdOrKey: 'foo',
    x: 0,
    y: 0,
    size: 0,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or (case-sensitive) key of the project. |
| `x` | `?int` | The X coordinate of the top-left corner of the crop region. |
| `y` | `?int` | The Y coordinate of the top-left corner of the crop region. |
| `size` | `?int` | The length of each side of the crop region. |

#### Response

Source: [`Jira\Client\Schema\Avatar`](/docs/schema/avatar.md)

Details of an avatar.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the avatar. |
| `fileName` | `string` | The file name of the avatar icon. Returned for system avatars. |
| `isDeletable` | `bool` | Whether the avatar can be deleted. |
| `isSelected` | `bool` | Whether the avatar is used in Jira. For example, shown as a project's avatar. |
| `isSystemAvatar` | `bool` | Whether the avatar is a system avatar. |
| `owner` | `string` | The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user. |
| `urls` | `array<string,string>` | The list of avatar icon URLs. |


## Get All Project Avatars
<a name="getAllProjectAvatars"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-avatars/#api-rest-api-3-project-project-id-or-key-avatars-get

Returns all project avatars, grouped by system and custom avatars

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\ProjectAvatars $response */
$response = $client->getAllProjectAvatars(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or (case-sensitive) key of the project. |

#### Response

Source: [`Jira\Client\Schema\ProjectAvatars`](/docs/schema/project-avatars.md)

List of project avatars.

| Property | Type | Description |
| --- | --- | --- |
| `custom` | [`?list<Avatar>`](/docs/schema/avatar.md) | List of avatars added to Jira. These avatars may be deleted. |
| `system` | [`?list<Avatar>`](/docs/schema/avatar.md) | List of avatars included with Jira. These avatars cannot be deleted. |
