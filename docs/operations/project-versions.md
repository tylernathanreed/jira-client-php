# Project Versions

Source: [`Jira\Client\Operations\ProjectVersions`](/src/Operations/ProjectVersions.php)

## Operations

- [Get Project Versions Paginated](#getProjectVersionsPaginated)
- [Get Project Versions](#getProjectVersions)
- [Create Version](#createVersion)
- [Get Version](#getVersion)
- [Update Version](#updateVersion)
- [Delete Version](#deleteVersion)
- [Merge Versions](#mergeVersions)
- [Move Version](#moveVersion)
- [Get Version's Related Issues Count](#getVersionRelatedIssues)
- [Get Related Work](#getRelatedWork)
- [Update Related Work](#updateRelatedWork)
- [Create Related Work](#createRelatedWork)
- [Delete And Replace Version](#deleteAndReplaceVersion)
- [Get Version's Unresolved Issues Count](#getVersionUnresolvedIssues)
- [Delete Related Work](#deleteRelatedWork)

## Get Project Versions Paginated
<a name="getProjectVersionsPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-project-project-id-or-key-version-get

Returns a "paginated" list of all versions in a project.
See the "Get project versions" resource if you want to get a full list of versions without pagination

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageBeanVersion $response */
$response = $client->getProjectVersionsPaginated(
    projectIdOrKey: 'foo',
    startAt: 0,
    maxResults: 50,
    orderBy: null,
    query: null,
    status: null,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `orderBy` | `'description'\|`<br/>`'-description'\|`<br/>`'+description'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'releaseDate'\|`<br/>`'-releaseDate'\|`<br/>`'+releaseDate'\|`<br/>`'sequence'\|`<br/>`'-sequence'\|`<br/>`'+sequence'\|`<br/>`'startDate'\|`<br/>`'-startDate'\|`<br/>`'+startDate'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `description` Sorts by version description.<br/> *  `name` Sorts by version name.<br/> *  `releaseDate` Sorts by release date, starting with the oldest date. Versions with no release date are listed last.<br/> *  `sequence` Sorts by the order of appearance in the user interface.<br/> *  `startDate` Sorts by start date, starting with the oldest date. Versions with no start date are listed last. |
| `query` | `?string` | Filter the results using a literal string. Versions with matching `name` or `description` are returned (case insensitive). |
| `status` | `?string` | A list of status values used to filter the results by version status. This parameter accepts a comma-separated list. The status values are `released`, `unreleased`, and `archived`. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `issuesstatus` Returns the number of issues in each status category for each version.<br/> *  `operations` Returns actions that can be performed on the specified version.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing the approvers for this version. |

#### Response

Source: [`Jira\Client\Schema\PageBeanVersion`](/docs/schema/page-bean-version.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Version>`](/docs/schema/version.md) | The list of items. |


## Get Project Versions
<a name="getProjectVersions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-project-project-id-or-key-versions-get

Returns all versions in a project.
The response is not paginated.
Use "Get project versions paginated" if you want to get the versions in a project with pagination

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getProjectVersions(
    projectIdOrKey: 'foo',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts `operations`, which returns actions that can be performed on the version. |

#### Response


## Create Version
<a name="createVersion"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-post

Creates a project version

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project the version is added to.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Version $response */
$response = $client->createVersion(new Schema\Version(
    archived: false,
    description: 'An excellent version',
    name: 'New Version 1',
    projectId: '10000',
    releaseDate: '2010-07-06',
    released: true,
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Version`](/docs/schema/version.md)

Details about a project version.

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | [`?list<VersionApprover>`](/docs/schema/version-approver.md) | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing approvers for this version.<br/><br/>Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | [`VersionIssuesStatus`](/docs/schema/version-issues-status.md) | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | [`?list<SimpleLink>`](/docs/schema/simple-link.md) | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |

#### Response

Source: [`Jira\Client\Schema\Version`](/docs/schema/version.md)

Details about a project version.

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | [`?list<VersionApprover>`](/docs/schema/version-approver.md) | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing approvers for this version.<br/><br/>Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | [`VersionIssuesStatus`](/docs/schema/version-issues-status.md) | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | [`?list<SimpleLink>`](/docs/schema/simple-link.md) | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |


## Get Version
<a name="getVersion"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-get

Returns a project version

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for the project containing the version.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Version $response */
$response = $client->getVersion(
    id: 'foo',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property represents the number of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing the Atlassian account IDs of approvers for this version. |

#### Response

Source: [`Jira\Client\Schema\Version`](/docs/schema/version.md)

Details about a project version.

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | [`?list<VersionApprover>`](/docs/schema/version-approver.md) | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing approvers for this version.<br/><br/>Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | [`VersionIssuesStatus`](/docs/schema/version-issues-status.md) | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | [`?list<SimpleLink>`](/docs/schema/simple-link.md) | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |


## Update Version
<a name="updateVersion"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-put

Updates a project version

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Version $response */
$response = $client->updateVersion(
    request: new Schema\Version(
        archived: false,
        description: 'An excellent version',
        id: '10000',
        name: 'New Version 1',
        overdue: true,
        projectId: '10000',
        releaseDate: '2010-07-06',
        released: true,
        self: 'https://your-domain.atlassian.net/rest/api/~ver~/version/10000',
        userReleaseDate: '6/Jul/2010',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Version`](/docs/schema/version.md)

Details about a project version.

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | [`?list<VersionApprover>`](/docs/schema/version-approver.md) | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing approvers for this version.<br/><br/>Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | [`VersionIssuesStatus`](/docs/schema/version-issues-status.md) | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | [`?list<SimpleLink>`](/docs/schema/simple-link.md) | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |

#### Response

Source: [`Jira\Client\Schema\Version`](/docs/schema/version.md)

Details about a project version.

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | [`?list<VersionApprover>`](/docs/schema/version-approver.md) | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing approvers for this version.<br/><br/>Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | [`VersionIssuesStatus`](/docs/schema/version-issues-status.md) | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | [`?list<SimpleLink>`](/docs/schema/simple-link.md) | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |


## Delete Version
<a name="deleteVersion"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-delete

Deletes a project version

Deprecated, use " Delete and replace version" that supports swapping version values in custom fields, in addition to the swapping for `fixVersion` and `affectedVersion` provided in this resource

Alternative versions can be provided to update issues that use the deleted version in `fixVersion` or `affectedVersion`.
If alternatives are not provided, occurrences of `fixVersion` and `affectedVersion` that contain the deleted version are cleared

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteVersion(
    id: 'foo',
    moveFixIssuesTo: null,
    moveAffectedIssuesTo: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |
| `moveFixIssuesTo` | `?string` | The ID of the version to update `fixVersion` to when the field contains the deleted version. The replacement version must be in the same project as the version being deleted and cannot be the version being deleted. |
| `moveAffectedIssuesTo` | `?string` | The ID of the version to update `affectedVersion` to when the field contains the deleted version. The replacement version must be in the same project as the version being deleted and cannot be the version being deleted. |

#### Response

`true`
## Merge Versions
<a name="mergeVersions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-mergeto-move-issues-to-put

Merges two project versions.
The merge is completed by deleting the version specified in `id` and replacing any occurrences of its ID in `fixVersion` with the version ID specified in `moveIssuesTo`

Consider using " Delete and replace version" instead.
This resource supports swapping version values in `fixVersion`, `affectedVersion`, and custom fields

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->mergeVersions(
    id: 'foo',
    moveIssuesTo: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version to delete. |
| `moveIssuesTo` | `string` | The ID of the version to merge into. |

#### Response

`true`
## Move Version
<a name="moveVersion"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-move-post

Modifies the version's sequence within the project, which affects the display order of the versions in Jira

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* project permission for the project that contains the version.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Version $response */
$response = $client->moveVersion(
    request: new Schema\VersionMoveBean(
        after: 'https://your-domain.atlassian.net/rest/api/~ver~/version/10000',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\VersionMoveBean`](/docs/schema/version-move-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `after` | `string` | The URL (self link) of the version after which to place the moved version. Cannot be used with `position`. |
| `position` | `'Earlier'\|`<br/>`'Later'\|`<br/>`'First'\|`<br/>`'Last'\|`<br/>`null` | An absolute position in which to place the moved version. Cannot be used with `after`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version to be moved. |

#### Response

Source: [`Jira\Client\Schema\Version`](/docs/schema/version.md)

Details about a project version.

| Property | Type | Description |
| --- | --- | --- |
| `approvers` | [`?list<VersionApprover>`](/docs/schema/version-approver.md) | If the expand option `approvers` is used, returns a list containing the approvers for this version. |
| `archived` | `bool` | Indicates that the version is archived. Optional when creating or updating a version. |
| `description` | `string` | The description of the version. Optional when creating or updating a version. The maximum size is 16,384 bytes. |
| `driver` | `string` | If the expand option `driver` is used, returns the Atlassian account ID of the driver. |
| `expand` | `string` | Use [expand](em>#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `operations` Returns the list of operations available for this version.<br/> *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*.<br/> *  `driver` Returns the Atlassian account ID of the version driver.<br/> *  `approvers` Returns a list containing approvers for this version.<br/><br/>Optional for create and update. |
| `id` | `string` | The ID of the version. |
| `issuesStatusForFixVersion` | [`VersionIssuesStatus`](/docs/schema/version-issues-status.md) | If the expand option `issuesstatus` is used, returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property contains a count of issues with a status other than *to do*, *in progress*, and *done*. |
| `moveUnfixedIssuesTo` | `string` | The URL of the self link to the version to which all unfixed issues are moved when a version is released. Not applicable when creating a version. Optional when updating a version. |
| `name` | `string` | The unique name of the version. Required when creating a version. Optional when updating a version. The maximum length is 255 characters. |
| `operations` | [`?list<SimpleLink>`](/docs/schema/simple-link.md) | If the expand option `operations` is used, returns the list of operations available for this version. |
| `overdue` | `bool` | Indicates that the version is overdue. |
| `project` | `string` | Deprecated. Use `projectId`. |
| `projectId` | `int` | The ID of the project to which this version is attached. Required when creating a version. Not applicable when updating a version. |
| `releaseDate` | `string` | The release date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `released` | `bool` | Indicates that the version is released. If the version is released a request to release again is ignored. Not applicable when creating a version. Optional when updating a version. |
| `self` | `string` | The URL of the version. |
| `startDate` | `string` | The start date of the version. Expressed in ISO 8601 format (yyyy-mm-dd). Optional when creating or updating a version. |
| `userReleaseDate` | `string` | The date on which work on this version is expected to finish, expressed in the instance's *Day/Month/Year Format* date format. |
| `userStartDate` | `string` | The date on which work on this version is expected to start, expressed in the instance's *Day/Month/Year Format* date format. |


## Get Version's Related Issues Count
<a name="getVersionRelatedIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-related-issue-counts-get

Returns the following counts for a version:

 - Number of issues where the `fixVersion` is set to the version
 - Number of issues where the `affectedVersion` is set to the version
 - Number of issues where a version custom field is set to the version

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* project permission for the project that contains the version.

### Example

```php
/** @var Schema\VersionIssueCounts $response */
$response = $client->getVersionRelatedIssues(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |

#### Response

Source: [`Jira\Client\Schema\VersionIssueCounts`](/docs/schema/version-issue-counts.md)

Various counts of issues within a version.

| Property | Type | Description |
| --- | --- | --- |
| `customFieldUsage` | [`?list<VersionUsageInCustomField>`](/docs/schema/version-usage-in-custom-field.md) | List of custom fields using the version. |
| `issueCountWithCustomFieldsShowingVersion` | `int` | Count of issues where a version custom field is set to the version. |
| `issuesAffectedCount` | `int` | Count of issues where the `affectedVersion` is set to the version. |
| `issuesFixedCount` | `int` | Count of issues where the `fixVersion` is set to the version. |
| `self` | `string` | The URL of these count details. |


## Get Related Work
<a name="getRelatedWork"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-relatedwork-get

Returns related work items for the given version id

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for the project containing the version.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getRelatedWork(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |

#### Response


## Update Related Work
<a name="updateRelatedWork"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-relatedwork-put

Updates the given related work.
You can only update generic link related works via Rest APIs.
Any archived version related works can't be edited

This operation can be accessed anonymously

**"Permissions" required:** *Resolve issues:* and *Edit issues* "Managing project permissions" for the project that contains the version.
See: https://confluence.atlassian.com/adminjiraserver/managing-project-permissions-938847145.html

### Example

```php
use Jira\Client\Schema;

/** @var Schema\VersionRelatedWork $response */
$response = $client->updateRelatedWork(
    request: new Schema\VersionRelatedWork(
        category: 'Design',
        relatedWorkId: 'fabcdef6-7878-1234-beaf-43211234abcd',
        title: 'Design link',
        url: 'https://www.atlassian.com',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\VersionRelatedWork`](/docs/schema/version-related-work.md)

Associated related work to a version

| Property | Type | Description |
| --- | --- | --- |
| `category` | `string` | The category of the related work |
| `issueId` | `int` | The ID of the issue associated with the related work (if there is one). Cannot be updated via the Rest API. |
| `relatedWorkId` | `string` | The id of the related work. For the native release note related work item, this will be null, and Rest API does not support updating it. |
| `title` | `string` | The title of the related work |
| `url` | `string` | The URL of the related work. Will be null for the native release note related work item, but is otherwise required. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version to update the related work on. For the related work id, pass it to the input JSON. |

#### Response

Source: [`Jira\Client\Schema\VersionRelatedWork`](/docs/schema/version-related-work.md)

Associated related work to a version

| Property | Type | Description |
| --- | --- | --- |
| `category` | `string` | The category of the related work |
| `issueId` | `int` | The ID of the issue associated with the related work (if there is one). Cannot be updated via the Rest API. |
| `relatedWorkId` | `string` | The id of the related work. For the native release note related work item, this will be null, and Rest API does not support updating it. |
| `title` | `string` | The title of the related work |
| `url` | `string` | The URL of the related work. Will be null for the native release note related work item, but is otherwise required. |


## Create Related Work
<a name="createRelatedWork"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-relatedwork-post

Creates a related work for the given version.
You can only create a generic link type of related works via this API.
relatedWorkId will be auto-generated UUID, that does not need to be provided

This operation can be accessed anonymously

**"Permissions" required:** *Resolve issues:* and *Edit issues* "Managing project permissions" for the project that contains the version.
See: https://confluence.atlassian.com/adminjiraserver/managing-project-permissions-938847145.html

### Example

```php
use Jira\Client\Schema;

/** @var Schema\VersionRelatedWork $response */
$response = $client->createRelatedWork(
    request: new Schema\VersionRelatedWork(
        category: 'Design',
        title: 'Design link',
        url: 'https://www.atlassian.com',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\VersionRelatedWork`](/docs/schema/version-related-work.md)

Associated related work to a version

| Property | Type | Description |
| --- | --- | --- |
| `category` | `string` | The category of the related work |
| `issueId` | `int` | The ID of the issue associated with the related work (if there is one). Cannot be updated via the Rest API. |
| `relatedWorkId` | `string` | The id of the related work. For the native release note related work item, this will be null, and Rest API does not support updating it. |
| `title` | `string` | The title of the related work |
| `url` | `string` | The URL of the related work. Will be null for the native release note related work item, but is otherwise required. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` |  |

#### Response

Source: [`Jira\Client\Schema\VersionRelatedWork`](/docs/schema/version-related-work.md)

Associated related work to a version

| Property | Type | Description |
| --- | --- | --- |
| `category` | `string` | The category of the related work |
| `issueId` | `int` | The ID of the issue associated with the related work (if there is one). Cannot be updated via the Rest API. |
| `relatedWorkId` | `string` | The id of the related work. For the native release note related work item, this will be null, and Rest API does not support updating it. |
| `title` | `string` | The title of the related work |
| `url` | `string` | The URL of the related work. Will be null for the native release note related work item, but is otherwise required. |


## Delete And Replace Version
<a name="deleteAndReplaceVersion"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-remove-and-swap-post

Deletes a project version

Alternative versions can be provided to update issues that use the deleted version in `fixVersion`, `affectedVersion`, or any version picker custom fields.
If alternatives are not provided, occurrences of `fixVersion`, `affectedVersion`, and any version picker custom field, that contain the deleted version, are cleared.
Any replacement version must be in the same project as the version being deleted and cannot be the version being deleted

This operation can be accessed anonymously

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\DeleteAndReplaceVersionBean`](/docs/schema/delete-and-replace-version-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `customFieldReplacementList` | [`?list<CustomFieldReplacement>`](/docs/schema/custom-field-replacement.md) | An array of custom field IDs (`customFieldId`) and version IDs (`moveTo`) to update when the fields contain the deleted version. |
| `moveAffectedIssuesTo` | `int` | The ID of the version to update `affectedVersion` to when the field contains the deleted version. |
| `moveFixIssuesTo` | `int` | The ID of the version to update `fixVersion` to when the field contains the deleted version. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |

#### Response

`true`
## Get Version's Unresolved Issues Count
<a name="getVersionUnresolvedIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-id-unresolved-issue-count-get

Returns counts of the issues and unresolved issues for the project version

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* project permission for the project that contains the version.

### Example

```php
/** @var Schema\VersionUnresolvedIssuesCount $response */
$response = $client->getVersionUnresolvedIssues(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the version. |

#### Response

Source: [`Jira\Client\Schema\VersionUnresolvedIssuesCount`](/docs/schema/version-unresolved-issues-count.md)

Count of a version's unresolved issues.

| Property | Type | Description |
| --- | --- | --- |
| `issuesCount` | `int` | Count of issues. |
| `issuesUnresolvedCount` | `int` | Count of unresolved issues. |
| `self` | `string` | The URL of these count details. |


## Delete Related Work
<a name="deleteRelatedWork"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-versions/#api-rest-api-3-version-version-id-relatedwork-related-work-id-delete

Deletes the given related work for the given version

This operation can be accessed anonymously

**"Permissions" required:** *Resolve issues:* and *Edit issues* "Managing project permissions" for the project that contains the version.
See: https://confluence.atlassian.com/adminjiraserver/managing-project-permissions-938847145.html

### Example

```php
/** @var true $response */
$response = $client->deleteRelatedWork(
    versionId: 'foo',
    relatedWorkId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `versionId` | `string` | The ID of the version that the target related work belongs to. |
| `relatedWorkId` | `string` | The ID of the related work to delete. |

#### Response

`true`
