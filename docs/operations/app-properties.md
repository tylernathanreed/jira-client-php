# App Properties

Source: [`Jira\Client\Operations\AppProperties`](/src/Operations/AppProperties.php)

## Operations

- [Get App Properties](#AddonPropertiesResource.getAddonProperties_get)
- [Get App Property](#AddonPropertiesResource.getAddonProperty_get)
- [Set App Property](#AddonPropertiesResource.putAddonProperty_put)
- [Delete App Property](#AddonPropertiesResource.deleteAddonProperty_delete)
- [Set App Property (Forge)](#putForgeAppProperty)
- [Delete App Property (Forge)](#deleteForgeAppProperty)

## Get App Properties
<a name="AddonPropertiesResource.getAddonProperties_get"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-properties/#api-rest-atlassian-connect-1-addons-addon-key-properties-get

Gets all the properties of an app

**"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->AddonPropertiesResource.getAddonProperties_get(
    addonKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `addonKey` | `string` | The key of the app, as defined in its descriptor. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get App Property
<a name="AddonPropertiesResource.getAddonProperty_get"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-properties/#api-rest-atlassian-connect-1-addons-addon-key-properties-property-key-get

Returns the key and value of an app's property

**"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->AddonPropertiesResource.getAddonProperty_get(
    addonKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `addonKey` | `string` | The key of the app, as defined in its descriptor. |
| `propertyKey` | `string` | The key of the property. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set App Property
<a name="AddonPropertiesResource.putAddonProperty_put"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-properties/#api-rest-atlassian-connect-1-addons-addon-key-properties-property-key-put

Sets the value of an app's property.
Use this resource to store custom data for your app

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

**"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).
See: http://tools.ietf.org/html/rfc4627

### Example

```php
/** @var Schema\OperationMessage $response */
$response = $client->AddonPropertiesResource.putAddonProperty_put(
    addonKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `addonKey` | `string` | The key of the app, as defined in its descriptor. |
| `propertyKey` | `string` | The key of the property. |

#### Response

Source: [`Jira\Client\Schema\OperationMessage`](/docs/schema/operation-message.md)

| Property | Type | Description |
| --- | --- | --- |
| `message` | `string` | The human-readable message that describes the result. |
| `statusCode` | `int` | The status code of the response. |


## Delete App Property
<a name="AddonPropertiesResource.deleteAddonProperty_delete"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-properties/#api-rest-atlassian-connect-1-addons-addon-key-properties-property-key-delete

Deletes an app's property

**"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).

### Example

```php
/** @var true $response */
$response = $client->AddonPropertiesResource.deleteAddonProperty_delete(
    addonKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `addonKey` | `string` | The key of the app, as defined in its descriptor. |
| `propertyKey` | `string` | The key of the property. |

#### Response

`true`
## Set App Property (Forge)
<a name="putForgeAppProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-properties/#api-rest-forge-1-app-properties-property-key-put

Sets the value of a Forge app's property
These values can be retrieved in "Jira expressions"
through the `app` "context variable"
They are also available in "entity property display conditions"

For other use cases, use the "Storage API"

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

**"Permissions" required:** Only Forge apps can make this request

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
See: /cloud/jira/platform/jira-expressions/
See: /cloud/jira/platform/jira-expressions/#context-variables
See: /platform/forge/manifest-reference/display-conditions/entity-property-conditions/
See: /platform/forge/runtime-reference/storage-api/
See: http://tools.ietf.org/html/rfc4627

### Example

```php
/** @var Schema\OperationMessage $response */
$response = $client->putForgeAppProperty(
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the property. |

#### Response

Source: [`Jira\Client\Schema\OperationMessage`](/docs/schema/operation-message.md)

| Property | Type | Description |
| --- | --- | --- |
| `message` | `string` | The human-readable message that describes the result. |
| `statusCode` | `int` | The status code of the response. |


## Delete App Property (Forge)
<a name="deleteForgeAppProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-properties/#api-rest-forge-1-app-properties-property-key-delete

Deletes a Forge app's property

**"Permissions" required:** Only Forge apps can make this request

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.

### Example

```php
/** @var true $response */
$response = $client->deleteForgeAppProperty(
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the property. |

#### Response

`true`
