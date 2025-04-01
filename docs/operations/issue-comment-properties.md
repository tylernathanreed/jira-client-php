# Issue Comment Properties

Source: [`Jira\Client\Operations\IssueCommentProperties`](/src/Operations/IssueCommentProperties.php)

## Operations

- [Get Comment Property Keys](#getCommentPropertyKeys)
- [Get Comment Property](#getCommentProperty)
- [Set Comment Property](#setCommentProperty)
- [Delete Comment Property](#deleteCommentProperty)

## Get Comment Property Keys
<a name="getCommentPropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comment-properties/#api-rest-api-3-comment-comment-id-properties-get

Returns the keys of all the properties of a comment

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getCommentPropertyKeys(
    commentId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `commentId` | `string` | The ID of the comment. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get Comment Property
<a name="getCommentProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comment-properties/#api-rest-api-3-comment-comment-id-properties-property-key-get

Returns the value of a comment property

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getCommentProperty(
    commentId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `commentId` | `string` | The ID of the comment. |
| `propertyKey` | `string` | The key of the property. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set Comment Property
<a name="setCommentProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comment-properties/#api-rest-api-3-comment-comment-id-properties-property-key-put

Creates or updates the value of a property for a comment.
Use this resource to store custom data against a comment

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

**"Permissions" required:** either of:

 - *Edit All Comments* "project permission" to create or update the value of a property on any comment
 - *Edit Own Comments* "project permission" to create or update the value of a property on a comment created by the user

Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `commentId` | `string` | The ID of the comment. |
| `propertyKey` | `string` | The key of the property. The maximum length is 255 characters. |

#### Response

`true`
## Delete Comment Property
<a name="deleteCommentProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comment-properties/#api-rest-api-3-comment-comment-id-properties-property-key-delete

Deletes a comment property

**"Permissions" required:** either of:

 - *Edit All Comments* "project permission" to delete a property from any comment
 - *Edit Own Comments* "project permission" to delete a property from a comment created by the user

Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteCommentProperty(
    commentId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `commentId` | `string` | The ID of the comment. |
| `propertyKey` | `string` | The key of the property. |

#### Response

`true`
