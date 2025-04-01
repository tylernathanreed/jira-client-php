# Issue Link Types

DummyDescription

Source: [`Jira\Client\Operations\IssueLinkTypes`](/src/Operations/IssueLinkTypes.php)

## Operations

- [Get Issue Link Types](#getIssueLinkTypes)
- [Create Issue Link Type](#createIssueLinkType)
- [Get Issue Link Type](#getIssueLinkType)
- [Update Issue Link Type](#updateIssueLinkType)
- [Delete Issue Link Type](#deleteIssueLinkType)

## Get Issue Link Types
<a name="getIssueLinkTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-link-types/#api-rest-api-3-issue-link-type-get

Returns a list of all issue link types

To use this operation, the site must have "issue linking" enabled

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for a project in the site.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\IssueLinkTypes $response */
$response = $client->getIssueLinkTypes();
```

### Request

#### Response

Source: [`Jira\Client\Schema\IssueLinkTypes`](/docs/schema/issue-link-types.md)

A list of issue link type beans.

| Property | Type | Description |
| --- | --- | --- |
| `issueLinkTypes` | [`?list<IssueLinkType>`](/docs/schema/issue-link-type.md) | The issue link type bean. |


## Create Issue Link Type
<a name="createIssueLinkType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-link-types/#api-rest-api-3-issue-link-type-post

Creates an issue link type.
Use this operation to create descriptions of the reasons why issues are linked.
The issue link type consists of a name and descriptions for a link's inward and outward relationships

To use this operation, the site must have "issue linking" enabled

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueLinkType $response */
$response = $client->createIssueLinkType(new Schema\IssueLinkType(
    inward: 'Duplicated by',
    name: 'Duplicate',
    outward: 'Duplicates',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueLinkType`](/docs/schema/issue-link-type.md)

This object is used as follows:

 - In the " issueLink" resource it defines and reports on the type of link between the issues.
Find a list of issue link types with "Get issue link types"
 - In the " issueLinkType" resource it defines and reports on issue link types.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only. |
| `inward` | `string` | The description of the issue link type inward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `name` | `string` | The name of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `outward` | `string` | The description of the issue link type outward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `self` | `string` | The URL of the issue link type. Read only. |

#### Response

Source: [`Jira\Client\Schema\IssueLinkType`](/docs/schema/issue-link-type.md)

This object is used as follows:

 - In the " issueLink" resource it defines and reports on the type of link between the issues.
Find a list of issue link types with "Get issue link types"
 - In the " issueLinkType" resource it defines and reports on issue link types.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only. |
| `inward` | `string` | The description of the issue link type inward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `name` | `string` | The name of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `outward` | `string` | The description of the issue link type outward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `self` | `string` | The URL of the issue link type. Read only. |


## Get Issue Link Type
<a name="getIssueLinkType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-link-types/#api-rest-api-3-issue-link-type-issue-link-type-id-get

Returns an issue link type

To use this operation, the site must have "issue linking" enabled

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for a project in the site.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\IssueLinkType $response */
$response = $client->getIssueLinkType(
    issueLinkTypeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueLinkTypeId` | `string` | The ID of the issue link type. |

#### Response

Source: [`Jira\Client\Schema\IssueLinkType`](/docs/schema/issue-link-type.md)

This object is used as follows:

 - In the " issueLink" resource it defines and reports on the type of link between the issues.
Find a list of issue link types with "Get issue link types"
 - In the " issueLinkType" resource it defines and reports on issue link types.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only. |
| `inward` | `string` | The description of the issue link type inward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `name` | `string` | The name of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `outward` | `string` | The description of the issue link type outward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `self` | `string` | The URL of the issue link type. Read only. |


## Update Issue Link Type
<a name="updateIssueLinkType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-link-types/#api-rest-api-3-issue-link-type-issue-link-type-id-put

Updates an issue link type

To use this operation, the site must have "issue linking" enabled

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueLinkType $response */
$response = $client->updateIssueLinkType(
    request: new Schema\IssueLinkType(
        inward: 'Duplicated by',
        name: 'Duplicate',
        outward: 'Duplicates',
    )
    issueLinkTypeId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueLinkType`](/docs/schema/issue-link-type.md)

This object is used as follows:

 - In the " issueLink" resource it defines and reports on the type of link between the issues.
Find a list of issue link types with "Get issue link types"
 - In the " issueLinkType" resource it defines and reports on issue link types.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only. |
| `inward` | `string` | The description of the issue link type inward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `name` | `string` | The name of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `outward` | `string` | The description of the issue link type outward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `self` | `string` | The URL of the issue link type. Read only. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueLinkTypeId` | `string` | The ID of the issue link type. |

#### Response

Source: [`Jira\Client\Schema\IssueLinkType`](/docs/schema/issue-link-type.md)

This object is used as follows:

 - In the " issueLink" resource it defines and reports on the type of link between the issues.
Find a list of issue link types with "Get issue link types"
 - In the " issueLinkType" resource it defines and reports on issue link types.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only. |
| `inward` | `string` | The description of the issue link type inward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `name` | `string` | The name of the issue link type and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `outward` | `string` | The description of the issue link type outward link and is used as follows:<br/><br/> *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.<br/> *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `self` | `string` | The URL of the issue link type. Read only. |


## Delete Issue Link Type
<a name="deleteIssueLinkType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-link-types/#api-rest-api-3-issue-link-type-issue-link-type-id-delete

Deletes an issue link type

To use this operation, the site must have "issue linking" enabled

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueLinkType(
    issueLinkTypeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueLinkTypeId` | `string` | The ID of the issue link type. |

#### Response

`true`
