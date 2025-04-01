# Issue Worklog Properties

DummyDescription

Source: [`Jira\Client\Operations\IssueWorklogProperties`](/src/Operations/IssueWorklogProperties.php)

## Operations

- [Get Worklog Property Keys](#getWorklogPropertyKeys)
- [Get Worklog Property](#getWorklogProperty)
- [Set Worklog Property](#setWorklogProperty)
- [Delete Worklog Property](#deleteWorklogProperty)

## Get Worklog Property Keys
<a name="getWorklogPropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklog-properties/#api-rest-api-3-issue-issue-id-or-key-worklog-worklog-id-properties-get

Returns the keys of all properties for a worklog

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getWorklogPropertyKeys(
    issueIdOrKey: 'foo',
    worklogId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `worklogId` | `string` | The ID of the worklog. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get Worklog Property
<a name="getWorklogProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklog-properties/#api-rest-api-3-issue-issue-id-or-key-worklog-worklog-id-properties-property-key-get

Returns the value of a worklog property

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getWorklogProperty(
    issueIdOrKey: 'foo',
    worklogId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `worklogId` | `string` | The ID of the worklog. |
| `propertyKey` | `string` | The key of the property. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set Worklog Property
<a name="setWorklogProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklog-properties/#api-rest-api-3-issue-issue-id-or-key-worklog-worklog-id-properties-property-key-put

Sets the value of a worklog property.
Use this operation to store custom data against the worklog

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Edit all worklogs*" project permission" to update any worklog or *Edit own worklogs* to update worklogs created by the user
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `worklogId` | `string` | The ID of the worklog. |
| `propertyKey` | `string` | The key of the issue property. The maximum length is 255 characters. |

#### Response

`true`
## Delete Worklog Property
<a name="deleteWorklogProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-worklog-properties/#api-rest-api-3-issue-issue-id-or-key-worklog-worklog-id-properties-property-key-delete

Deletes a worklog property

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->deleteWorklogProperty(
    issueIdOrKey: 'foo',
    worklogId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `worklogId` | `string` | The ID of the worklog. |
| `propertyKey` | `string` | The key of the property. |

#### Response

`true`
