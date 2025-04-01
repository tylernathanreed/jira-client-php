# Issue Type Properties

Source: [`Jira\Client\Operations\IssueTypeProperties`](/src/Operations/IssueTypeProperties.php)

## Operations

- [Get Issue Type Property Keys](#getIssueTypePropertyKeys)
- [Get Issue Type Property](#getIssueTypeProperty)
- [Set Issue Type Property](#setIssueTypeProperty)
- [Delete Issue Type Property](#deleteIssueTypeProperty)

## Get Issue Type Property Keys
<a name="getIssueTypePropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-properties/#api-rest-api-3-issuetype-issue-type-id-properties-get

Returns all the "issue type property" keys of the issue type

This operation can be accessed anonymously

**"Permissions" required:**

 - *Administer Jira* "global permission" to get the property keys of any issue type
 - *Browse projects* "project permission" to get the property keys of any issue types associated with the projects the user has permission to browse.
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getIssueTypePropertyKeys(
    issueTypeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The ID of the issue type. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get Issue Type Property
<a name="getIssueTypeProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-properties/#api-rest-api-3-issuetype-issue-type-id-properties-property-key-get

Returns the key and value of the "issue type property"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Administer Jira* "global permission" to get the details of any issue type
 - *Browse projects* "project permission" to get the details of any issue types associated with the projects the user has permission to browse.
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getIssueTypeProperty(
    issueTypeId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The ID of the issue type. |
| `propertyKey` | `string` | The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set Issue Type Property
<a name="setIssueTypeProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-properties/#api-rest-api-3-issuetype-issue-type-id-properties-property-key-put

Creates or updates the value of the "issue type property".
Use this resource to store and update data against an issue type

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The ID of the issue type. |
| `propertyKey` | `string` | The key of the issue type property. The maximum length is 255 characters. |

#### Response

`true`
## Delete Issue Type Property
<a name="deleteIssueTypeProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-properties/#api-rest-api-3-issuetype-issue-type-id-properties-property-key-delete

Deletes the "issue type property"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueTypeProperty(
    issueTypeId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeId` | `string` | The ID of the issue type. |
| `propertyKey` | `string` | The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys. |

#### Response

`true`
