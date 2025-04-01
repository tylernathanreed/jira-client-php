# Issue Properties

Source: [`Jira\Client\Operations\IssueProperties`](/src/Operations/IssueProperties.php)

## Operations

- [Bulk Set Issues Properties By List](#bulkSetIssuesPropertiesList)
- [Bulk Set Issue Properties By Issue](#bulkSetIssuePropertiesByIssue)
- [Bulk Set Issue Property](#bulkSetIssueProperty)
- [Bulk Delete Issue Property](#bulkDeleteIssueProperty)
- [Get Issue Property Keys](#getIssuePropertyKeys)
- [Get Issue Property](#getIssueProperty)
- [Set Issue Property](#setIssueProperty)
- [Delete Issue Property](#deleteIssueProperty)

## Bulk Set Issues Properties By List
<a name="bulkSetIssuesPropertiesList"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-properties-post

Sets or updates a list of entity property values on issues.
A list of up to 10 entity properties can be specified along with up to 10,000 issues on which to set or update that list of entity properties

The value of the request body must be a "valid", non-empty JSON.
The maximum length of single issue property value is 32768 characters.
This operation can be accessed anonymously

This operation is:

 - transactional, either all properties are updated in all eligible issues or, when errors occur, no properties are updated
 - "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:**

 - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueEntityProperties`](/docs/schema/issue-entity-properties.md)

Lists of issues and entity properties.
See "Entity properties" for more information.
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `entitiesIds` | `?list<int>` | A list of entity property IDs. |
| `properties` | [`array<string,JsonNode>`](/docs/schema/json-node.md) | A list of entity property keys and values. |

#### Response

`true`
## Bulk Set Issue Properties By Issue
<a name="bulkSetIssuePropertiesByIssue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-properties-multi-post

Sets or updates entity property values on issues.
Up to 10 entity properties can be specified for each issue and up to 100 issues included in the request

The value of the request body must be a "valid", non-empty JSON

This operation is:

 - "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
 - non-transactional.
Updating some entities may fail.
Such information will available in the task result

**"Permissions" required:**

 - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\MultiIssueEntityProperties`](/docs/schema/multi-issue-entity-properties.md)

A list of issues and their respective properties to set or update.
See "Entity properties" for more information.
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `issues` | [`?list<IssueEntityPropertiesForMultiUpdate>`](/docs/schema/issue-entity-properties-for-multi-update.md) | A list of issue IDs and their respective properties. |

#### Response

`true`
## Bulk Set Issue Property
<a name="bulkSetIssueProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-properties-property-key-put

Sets a property value on multiple issues

The value set can be a constant or determined by a "Jira expression".
Expressions must be computable with constant complexity when applied to a set of issues.
Expressions must also comply with the "restrictions" that apply to all Jira expressions

The issues to be updated can be specified by a filter

The filter identifies issues eligible for update using these criteria:

 - `entityIds` Only issues from this list are eligible
 - `currentValue` Only issues with the property set to this value are eligible
 - `hasProperty`:
    
     - If *true*, only issues with the property are eligible
     - If *false*, only issues without the property are eligible

If more than one criteria is specified, they are joined with the logical *AND*: only issues that satisfy all criteria are eligible

If an invalid combination of criteria is provided, an error is returned.
For example, specifying a `currentValue` and `hasProperty` as *false* would not match any issues (because without the property the property cannot have a value)

The filter is optional.
Without the filter all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible

This operation is:

 - transactional, either all eligible issues are updated or, when errors occur, none are updated
 - "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:**

 - *Browse projects* "project permission" for each project containing issues
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Edit issues* "project permission" for each issue.
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkIssuePropertyUpdateRequest`](/docs/schema/bulk-issue-property-update-request.md)

Bulk issue property update request details.

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `string` | EXPERIMENTAL. The Jira expression to calculate the value of the property. The value of the expression must be an object that can be converted to JSON, such as a number, boolean, string, list, or map. The context variables available to the expression are `issue` and `user`. Issues for which the expression returns a value whose JSON representation is longer than 32768 characters are ignored. |
| `filter` | [`IssueFilterForBulkPropertySet`](/docs/schema/issue-filter-for-bulk-property-set.md) | The bulk operation filter. |
| `value` | `mixed` | The value of the property. The value must be a [valid](https://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the property. The maximum length is 255 characters. |

#### Response

`true`
## Bulk Delete Issue Property
<a name="bulkDeleteIssueProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-properties-property-key-delete

Deletes a property value from multiple issues.
The issues to be updated can be specified by filter criteria

The criteria the filter used to identify eligible issues are:

 - `entityIds` Only issues from this list are eligible
 - `currentValue` Only issues with the property set to this value are eligible

If both criteria is specified, they are joined with the logical *AND*: only issues that satisfy both criteria are considered eligible

If no filter criteria are specified, all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible

This operation is:

 - transactional, either the property is deleted from all eligible issues or, when errors occur, no properties are deleted
 - "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:**

 - *Browse projects* " project permission" for each project containing issues
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Edit issues* "project permission" for each issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueFilterForBulkPropertyDelete`](/docs/schema/issue-filter-for-bulk-property-delete.md)

Bulk operation filter details.

| Property | Type | Description |
| --- | --- | --- |
| `currentValue` | `mixed` | The value of properties to perform the bulk operation on. |
| `entityIds` | `?list<int>` | List of issues to perform the bulk delete operation on. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the property. |

#### Response

`true`
## Get Issue Property Keys
<a name="getIssuePropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-issue-id-or-key-properties-get

Returns the URLs and keys of an issue's properties

This operation can be accessed anonymously

**"Permissions" required:** Property details are only returned where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getIssuePropertyKeys(
    issueIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The key or ID of the issue. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get Issue Property
<a name="getIssueProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-issue-id-or-key-properties-property-key-get

Returns the key and value of an issue's property

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getIssueProperty(
    issueIdOrKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The key or ID of the issue. |
| `propertyKey` | `string` | The key of the property. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set Issue Property
<a name="setIssueProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-issue-id-or-key-properties-property-key-put

Sets the value of an issue's property.
Use this resource to store custom data against an issue

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `propertyKey` | `string` | The key of the issue property. The maximum length is 255 characters. |

#### Response

`true`
## Delete Issue Property
<a name="deleteIssueProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-properties/#api-rest-api-3-issue-issue-id-or-key-properties-property-key-delete

Deletes an issue's property

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Edit issues* "project permissions" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueProperty(
    issueIdOrKey: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The key or ID of the issue. |
| `propertyKey` | `string` | The key of the property. |

#### Response

`true`
