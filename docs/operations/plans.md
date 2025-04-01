# Plans

DummyDescription

Source: [`Jira\Client\Operations\Plans`](/src/Operations/Plans.php)

## Operations

- [Get Plans Paginated](#getPlans)
- [Create Plan](#createPlan)
- [Get Plan](#getPlan)
- [Update Plan](#updatePlan)
- [Archive Plan](#archivePlan)
- [Duplicate Plan](#duplicatePlan)
- [Trash Plan](#trashPlan)

## Get Plans Paginated
<a name="getPlans"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-get

Returns a "paginated" list of plans

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageWithCursorGetPlanResponseForPage $response */
$response = $client->getPlans(
    includeTrashed: false,
    includeArchived: false,
    cursor: '',
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `includeTrashed` | `?bool` | Whether to include trashed plans in the results. |
| `includeArchived` | `?bool` | Whether to include archived plans in the results. |
| `cursor` | `?string` | The cursor to start from. If not provided, the first page will be returned. |
| `maxResults` | `?int` | The maximum number of plans to return per page. The maximum value is 50. The default value is 50. |

#### Response

Source: [`Jira\Client\Schema\PageWithCursorGetPlanResponseForPage`](/docs/schema/page-with-cursor-get-plan-response-for-page.md)

| Property | Type | Description |
| --- | --- | --- |
| `cursor` | `string` |  |
| `last` | `bool` |  |
| `nextPageCursor` | `string` |  |
| `size` | `int` |  |
| `total` | `int` |  |
| `values` | [`?list<GetPlanResponseForPage>`](/docs/schema/get-plan-response-for-page.md) |  |


## Create Plan
<a name="createPlan"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-post

Creates a plan

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\CreatePlanRequest`](/docs/schema/create-plan-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `issueSources` | [`list<CreateIssueSourceRequest>`](/docs/schema/create-issue-source-request.md) | The issue sources to include in the plan. |
| `name` | `string` | The plan name. |
| `scheduling` | [`CreateSchedulingRequest`](/docs/schema/create-scheduling-request.md) | The scheduling settings for the plan. |
| `crossProjectReleases` | [`?list<CreateCrossProjectReleaseRequest>`](/docs/schema/create-cross-project-release-request.md) | The cross-project releases to include in the plan. |
| `customFields` | [`?list<CreateCustomFieldRequest>`](/docs/schema/create-custom-field-request.md) | The custom fields for the plan. |
| `exclusionRules` | [`CreateExclusionRulesRequest`](/docs/schema/create-exclusion-rules-request.md) | The exclusion rules for the plan. |
| `leadAccountId` | `string` | The account ID of the plan lead. |
| `permissions` | [`?list<CreatePermissionRequest>`](/docs/schema/create-permission-request.md) | The permissions for the plan. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `useGroupId` | `?bool` | Whether to accept group IDs instead of group names. Group names are deprecated. |

#### Response

`true`
## Get Plan
<a name="getPlan"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-plan-id-get

Returns a plan

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\GetPlanResponse $response */
$response = $client->getPlan(
    planId: 1234,
    useGroupId: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `useGroupId` | `?bool` | Whether to return group IDs instead of group names. Group names are deprecated. |

#### Response

Source: [`Jira\Client\Schema\GetPlanResponse`](/docs/schema/get-plan-response.md)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The plan ID. |
| `scheduling` | [`GetSchedulingResponse`](/docs/schema/get-scheduling-response.md) | The scheduling settings for the plan. |
| `status` | `'Active'\|'Trashed'\|'Archived'` | The plan status. This is "Active", "Trashed" or "Archived". |
| `crossProjectReleases` | [`?list<GetCrossProjectReleaseResponse>`](/docs/schema/get-cross-project-release-response.md) | The cross-project releases included in the plan. |
| `customFields` | [`?list<GetCustomFieldResponse>`](/docs/schema/get-custom-field-response.md) | The custom fields for the plan. |
| `exclusionRules` | [`GetExclusionRulesResponse`](/docs/schema/get-exclusion-rules-response.md) | The exclusion rules for the plan. |
| `issueSources` | [`?list<GetIssueSourceResponse>`](/docs/schema/get-issue-source-response.md) | The issue sources included in the plan. |
| `lastSaved` | `string` | The date when the plan was last saved in UTC. |
| `leadAccountId` | `string` | The account ID of the plan lead. |
| `name` | `string` | The plan name. |
| `permissions` | [`?list<GetPermissionResponse>`](/docs/schema/get-permission-response.md) | The permissions for the plan. |


## Update Plan
<a name="updatePlan"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-plan-id-put

Updates any of the following details of a plan using "JSON Patch"

 - name
 - leadAccountId
 - scheduling
    
     - estimation with StoryPoints, Days or Hours as possible values
     - startDate
        
         - type with DueDate, TargetStartDate, TargetEndDate or DateCustomField as possible values
         - dateCustomFieldId
     - endDate
        
         - type with DueDate, TargetStartDate, TargetEndDate or DateCustomField as possible values
         - dateCustomFieldId
     - inferredDates with None, SprintDates or ReleaseDates as possible values
     - dependencies with Sequential or Concurrent as possible values
 - issueSources
    
     - type with Board, Project or Filter as possible values
     - value
 - exclusionRules
    
     - numberOfDaysToShowCompletedIssues
     - issueIds
     - workStatusIds
     - workStatusCategoryIds
     - issueTypeIds
     - releaseIds
 - crossProjectReleases
    
     - name
     - releaseIds
 - customFields
    
     - customFieldId
     - filter
 - permissions
    
     - type with View or Edit as possible values
     - holder
        
         - type with Group or AccountId as possible values
         - value

**"Permissions" required:** *Administer Jira* "global permission"

*Note that "add" operations do not respect array indexes in target locations.
Call the "Get plan" endpoint to find out the order of array elements.*
See: https://datatracker.ietf.org/doc/html/rfc6902
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->updatePlan(
    planId: 1234,
    useGroupId: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `useGroupId` | `?bool` | Whether to accept group IDs instead of group names. Group names are deprecated. |

#### Response

`true`
## Archive Plan
<a name="archivePlan"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-plan-id-archive-put

Archives a plan

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->archivePlan(
    planId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |

#### Response

`true`
## Duplicate Plan
<a name="duplicatePlan"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-plan-id-duplicate-post

Duplicates a plan

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\DuplicatePlanRequest`](/docs/schema/duplicate-plan-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The plan name. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |

#### Response

`true`
## Trash Plan
<a name="trashPlan"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-plans/#api-rest-api-3-plans-plan-plan-id-trash-put

Moves a plan to trash

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->trashPlan(
    planId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |

#### Response

`true`
