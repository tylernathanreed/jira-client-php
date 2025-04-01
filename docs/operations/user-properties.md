# User Properties

Source: [`Jira\Client\Operations\UserProperties`](/src/Operations/UserProperties.php)

## Operations

- [Get User Property Keys](#getUserPropertyKeys)
- [Get User Property](#getUserProperty)
- [Set User Property](#setUserProperty)
- [Delete User Property](#deleteUserProperty)

## Get User Property Keys
<a name="getUserPropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-properties/#api-rest-api-3-user-properties-get

Returns the keys of all properties for a user

Note: This operation does not access the "user properties" created and maintained in Jira

**"Permissions" required:**

 - *Administer Jira* "global permission", to access the property keys on any user
 - Access to Jira, to access the calling user's property keys.
See: https://confluence.atlassian.com/x/8YxjL
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getUserPropertyKeys(
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    userKey: null,
    username: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `userKey` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `username` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get User Property
<a name="getUserProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-properties/#api-rest-api-3-user-properties-property-key-get

Returns the value of a user's property.
If no property key is provided "Get user property keys" is called

Note: This operation does not access the "user properties" created and maintained in Jira

**"Permissions" required:**

 - *Administer Jira* "global permission", to get a property from any user
 - Access to Jira, to get a property from the calling user's record.
See: https://confluence.atlassian.com/x/8YxjL
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getUserProperty(
    propertyKey: 'foo',
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    userKey: null,
    username: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the user's property. |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `userKey` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `username` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set User Property
<a name="setUserProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-properties/#api-rest-api-3-user-properties-property-key-put

Sets the value of a user's property.
Use this resource to store custom data against a user

Note: This operation does not access the "user properties" created and maintained in Jira

**"Permissions" required:**

 - *Administer Jira* "global permission", to set a property on any user
 - Access to Jira, to set a property on the calling user's record.
See: https://confluence.atlassian.com/x/8YxjL
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the user's property. The maximum length is 255 characters. |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `userKey` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `username` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

`true`
## Delete User Property
<a name="deleteUserProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-properties/#api-rest-api-3-user-properties-property-key-delete

Deletes a property from a user

Note: This operation does not access the "user properties" created and maintained in Jira

**"Permissions" required:**

 - *Administer Jira* "global permission", to delete a property from any user
 - Access to Jira, to delete a property from the calling user's record.
See: https://confluence.atlassian.com/x/8YxjL
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteUserProperty(
    propertyKey: 'foo',
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    userKey: null,
    username: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the user's property. |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `userKey` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `username` | `?string` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

`true`
