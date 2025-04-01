# Project Properties

Source: [`Jira\Client\Operations\ProjectProperties`](/src/Operations/ProjectProperties.php)

## Operations

- [Get Project Property Keys](#getProjectPropertyKeys)
- [Get Project Property](#getProjectProperty)
- [Set Project Property](#setProjectProperty)
- [Delete Project Property](#deleteProjectProperty)

## Get Project Property Keys
<a name="getProjectPropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-properties/#api-rest-api-3-project-project-id-or-key-properties-get

Returns all "project property" keys for the project

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getProjectPropertyKeys(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get Project Property
<a name="getProjectProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-properties/#api-rest-api-3-project-project-id-or-key-properties-property-key-get

Returns the value of a "project property"

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project containing the property.
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getProjectProperty(
    projectIdOrKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `propertyKey` | `string` | The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set Project Property
<a name="setProjectProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-properties/#api-rest-api-3-project-project-id-or-key-properties-property-key-put

Sets the value of the "project property".
You can use project properties to store custom data against the project

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project in which the property is created.
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `propertyKey` | `string` | The key of the project property. The maximum length is 255 characters. |

#### Response

`true`
## Delete Project Property
<a name="deleteProjectProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-properties/#api-rest-api-3-project-project-id-or-key-properties-property-key-delete

Deletes the "property" from a project

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project containing the property.
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteProjectProperty(
    projectIdOrKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `propertyKey` | `string` | The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys. |

#### Response

`true`
