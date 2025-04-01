# Avatars

Source: [`Jira\Client\Operations\Avatars`](/src/Operations/Avatars.php)

## Operations

- [Get System Avatars By Type](#getAllSystemAvatars)
- [Get Avatars](#getAvatars)
- [Load Avatar](#storeAvatar)
- [Delete Avatar](#deleteAvatar)
- [Get Avatar Image By Type](#getAvatarImageByType)
- [Get Avatar Image By ID](#getAvatarImageByID)
- [Get Avatar Image By Owner](#getAvatarImageByOwner)

## Get System Avatars By Type
<a name="getAllSystemAvatars"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-avatar-type-system-get

Returns a list of system avatar details by owner type, where the owner types are issue type, project, user or priority

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\SystemAvatars $response */
$response = $client->getAllSystemAvatars(
    type: 'project',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'issuetype'\|`<br/>`'project'\|`<br/>`'user'\|`<br/>`'priority'` | The avatar type. |

#### Response

Source: [`Jira\Client\Schema\SystemAvatars`](/docs/schema/system-avatars.md)

List of system avatars.

| Property | Type | Description |
| --- | --- | --- |
| `system` | [`?list<Avatar>`](/docs/schema/avatar.md) | A list of avatar details. |


## Get Avatars
<a name="getAvatars"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-universal_avatar-type-type-owner-entity-id-get

Returns the system and custom avatars for a project, issue type or priority

This operation can be accessed anonymously

**"Permissions" required:**

 - for custom project avatars, *Browse projects* "project permission" for the project the avatar belongs to
 - for custom issue type avatars, *Browse projects* "project permission" for at least one project the issue type is used in
 - for system avatars, none
 - for priority avatars, none.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Avatars $response */
$response = $client->getAvatars(
    type: 'foo',
    entityId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'project'\|'issuetype'\|'priority'` | The avatar type. |
| `entityId` | `string` | The ID of the item the avatar is associated with. |

#### Response

Source: [`Jira\Client\Schema\Avatars`](/docs/schema/avatars.md)

Details about system and custom avatars.

| Property | Type | Description |
| --- | --- | --- |
| `custom` | [`?list<Avatar>`](/docs/schema/avatar.md) | Custom avatars list. |
| `system` | [`?list<Avatar>`](/docs/schema/avatar.md) | System avatars list. |


## Load Avatar
<a name="storeAvatar"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-universal_avatar-type-type-owner-entity-id-post

Loads a custom avatar for a project, issue type or priority

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

`--url 'https://your-domain.atlassian.net/rest/api/3/universal_avatar/type/{type}/owner/{entityId}'`

The avatar is cropped to a square.
If no crop parameters are specified, the square originates at the top left of the image.
The length of the square's sides is set to the smaller of the height or width of the image

The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size

After creating the avatar use:

 - "Update issue type" to set it as the issue type's displayed avatar
 - "Set project avatar" to set it as the project's displayed avatar
 - "Update priority" to set it as the priority's displayed avatar

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\Avatar $response */
$response = $client->storeAvatar(
    type: 'foo',
    entityId: 'foo',
    size: 0,
    x: 0,
    y: 0,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'project'\|'issuetype'\|'priority'` | The avatar type. |
| `entityId` | `string` | The ID of the item the avatar is associated with. |
| `size` | `int` | The length of each side of the crop region. |
| `x` | `?int` | The X coordinate of the top-left corner of the crop region. |
| `y` | `?int` | The Y coordinate of the top-left corner of the crop region. |

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


## Delete Avatar
<a name="deleteAvatar"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-universal_avatar-type-type-owner-owning-object-id-avatar-id-delete

Deletes an avatar from a project, issue type or priority

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteAvatar(
    type: 'foo',
    owningObjectId: 'foo',
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'project'\|'issuetype'\|'priority'` | The avatar type. |
| `owningObjectId` | `string` | The ID of the item the avatar is associated with. |
| `id` | `int` | The ID of the avatar. |

#### Response

`true`
## Get Avatar Image By Type
<a name="getAvatarImageByType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-universal_avatar-view-type-type-get

Returns the default project, issue type or priority avatar image

This operation can be accessed anonymously

**"Permissions" required:** None.


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'issuetype'\|'project'\|'priority'` | The icon type of the avatar. |
| `size` | `'xsmall'\|`<br/>`'small'\|`<br/>`'medium'\|`<br/>`'large'\|`<br/>`'xlarge'\|`<br/>`null` | The size of the avatar image. If not provided the default size is returned. |
| `format` | `'png'\|'svg'\|null` | The format to return the avatar image in. If not provided the original content format is returned. |

#### Response

Source: [`Jira\Client\Schema\StreamingResponseBody`](/docs/schema/streaming-response-body.md)

*None*


## Get Avatar Image By ID
<a name="getAvatarImageByID"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-universal_avatar-view-type-type-avatar-id-get

Returns a project, issue type or priority avatar image by ID

This operation can be accessed anonymously

**"Permissions" required:**

 - For system avatars, none
 - For custom project avatars, *Browse projects* "project permission" for the project the avatar belongs to
 - For custom issue type avatars, *Browse projects* "project permission" for at least one project the issue type is used in
 - For priority avatars, none.
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'issuetype'\|'project'\|'priority'` | The icon type of the avatar. |
| `id` | `int` | The ID of the avatar. |
| `size` | `'xsmall'\|`<br/>`'small'\|`<br/>`'medium'\|`<br/>`'large'\|`<br/>`'xlarge'\|`<br/>`null` | The size of the avatar image. If not provided the default size is returned. |
| `format` | `'png'\|'svg'\|null` | The format to return the avatar image in. If not provided the original content format is returned. |

#### Response

Source: [`Jira\Client\Schema\StreamingResponseBody`](/docs/schema/streaming-response-body.md)

*None*


## Get Avatar Image By Owner
<a name="getAvatarImageByOwner"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/#api-rest-api-3-universal_avatar-view-type-type-owner-entity-id-get

Returns the avatar image for a project, issue type or priority

This operation can be accessed anonymously

**"Permissions" required:**

 - For system avatars, none
 - For custom project avatars, *Browse projects* "project permission" for the project the avatar belongs to
 - For custom issue type avatars, *Browse projects* "project permission" for at least one project the issue type is used in
 - For priority avatars, none.
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'issuetype'\|'project'\|'priority'` | The icon type of the avatar. |
| `entityId` | `string` | The ID of the project or issue type the avatar belongs to. |
| `size` | `'xsmall'\|`<br/>`'small'\|`<br/>`'medium'\|`<br/>`'large'\|`<br/>`'xlarge'\|`<br/>`null` | The size of the avatar image. If not provided the default size is returned. |
| `format` | `'png'\|'svg'\|null` | The format to return the avatar image in. If not provided the original content format is returned. |

#### Response

Source: [`Jira\Client\Schema\StreamingResponseBody`](/docs/schema/streaming-response-body.md)

*None*
