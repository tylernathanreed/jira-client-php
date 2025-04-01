# Teams In Plan

Source: [`Jira\Client\Operations\TeamsInPlan`](/src/Operations/TeamsInPlan.php)

## Operations

- [Get Teams In Plan Paginated](#getTeams)
- [Add Atlassian Team To Plan](#addAtlassianTeam)
- [Get Atlassian Team In Plan](#getAtlassianTeam)
- [Update Atlassian Team In Plan](#updateAtlassianTeam)
- [Remove Atlassian Team From Plan](#removeAtlassianTeam)
- [Create Plan-only Team](#createPlanOnlyTeam)
- [Get Plan-only Team](#getPlanOnlyTeam)
- [Update Plan-only Team](#updatePlanOnlyTeam)
- [Delete Plan-only Team](#deletePlanOnlyTeam)

## Get Teams In Plan Paginated
<a name="getTeams"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-get

Returns a "paginated" list of plan-only and Atlassian teams in a plan

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageWithCursorGetTeamResponseForPage $response */
$response = $client->getTeams(
    planId: 1234,
    cursor: '',
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `cursor` | `?string` | The cursor to start from. If not provided, the first page will be returned. |
| `maxResults` | `?int` | The maximum number of plan teams to return per page. The maximum value is 50. The default value is 50. |

#### Response

Source: [`Jira\Client\Schema\PageWithCursorGetTeamResponseForPage`](/docs/schema/page-with-cursor-get-team-response-for-page.md)

| Property | Type | Description |
| --- | --- | --- |
| `cursor` | `string` |  |
| `last` | `bool` |  |
| `nextPageCursor` | `string` |  |
| `size` | `int` |  |
| `total` | `int` |  |
| `values` | [`?list<GetTeamResponseForPage>`](/docs/schema/get-team-response-for-page.md) |  |


## Add Atlassian Team To Plan
<a name="addAtlassianTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-atlassian-post

Adds an existing Atlassian team to a plan and configures their plannning settings

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->addAtlassianTeam(
    request: new Schema\AddAtlassianTeamRequest(
        capacity: '200',
        id: 'AtlassianTeamId',
        issueSourceId: '0',
        planningStyle: 'Scrum',
        sprintLength: '2',
    )
    planId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AddAtlassianTeamRequest`](/docs/schema/add-atlassian-team-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The Atlassian team ID. |
| `planningStyle` | `'Scrum'\|'Kanban'` | The planning style for the Atlassian team. This must be "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the Atlassian team. |
| `issueSourceId` | `int` | The ID of the issue source for the Atlassian team. |
| `sprintLength` | `int` | The sprint length for the Atlassian team. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |

#### Response

`true`
## Get Atlassian Team In Plan
<a name="getAtlassianTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-atlassian-atlassian-team-id-get

Returns planning settings for an Atlassian team in a plan

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\GetAtlassianTeamResponse $response */
$response = $client->getAtlassianTeam(
    planId: 1234,
    atlassianTeamId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `atlassianTeamId` | `string` | The ID of the Atlassian team. |

#### Response

Source: [`Jira\Client\Schema\GetAtlassianTeamResponse`](/docs/schema/get-atlassian-team-response.md)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The Atlassian team ID. |
| `planningStyle` | `'Scrum'\|'Kanban'` | The planning style for the Atlassian team. This is "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the Atlassian team. |
| `issueSourceId` | `int` | The ID of the issue source for the Atlassian team. |
| `sprintLength` | `int` | The sprint length for the Atlassian team. |


## Update Atlassian Team In Plan
<a name="updateAtlassianTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-atlassian-atlassian-team-id-put

Updates any of the following planning settings of an Atlassian team in a plan using "JSON Patch"

 - planningStyle
 - issueSourceId
 - sprintLength
 - capacity

**"Permissions" required:** *Administer Jira* "global permission"

*Note that "add" operations do not respect array indexes in target locations.
Call the "Get Atlassian team in plan" endpoint to find out the order of array elements.*
See: https://datatracker.ietf.org/doc/html/rfc6902
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->updateAtlassianTeam(
    planId: 1234,
    atlassianTeamId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `atlassianTeamId` | `string` | The ID of the Atlassian team. |

#### Response

`true`
## Remove Atlassian Team From Plan
<a name="removeAtlassianTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-atlassian-atlassian-team-id-delete

Removes an Atlassian team from a plan and deletes their planning settings

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeAtlassianTeam(
    planId: 1234,
    atlassianTeamId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `atlassianTeamId` | `string` | The ID of the Atlassian team. |

#### Response

`true`
## Create Plan-only Team
<a name="createPlanOnlyTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-planonly-post

Creates a plan-only team and configures their planning settings

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\CreatePlanOnlyTeamRequest`](/docs/schema/create-plan-only-team-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The plan-only team name. |
| `planningStyle` | `'Scrum'\|'Kanban'` | The planning style for the plan-only team. This must be "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the plan-only team. |
| `issueSourceId` | `int` | The ID of the issue source for the plan-only team. |
| `memberAccountIds` | `?list<string>` | The account IDs of the plan-only team members. |
| `sprintLength` | `int` | The sprint length for the plan-only team. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |

#### Response

`true`
## Get Plan-only Team
<a name="getPlanOnlyTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-planonly-plan-only-team-id-get

Returns planning settings for a plan-only team

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\GetPlanOnlyTeamResponse $response */
$response = $client->getPlanOnlyTeam(
    planId: 1234,
    planOnlyTeamId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `planOnlyTeamId` | `int` | The ID of the plan-only team. |

#### Response

Source: [`Jira\Client\Schema\GetPlanOnlyTeamResponse`](/docs/schema/get-plan-only-team-response.md)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The plan-only team ID. |
| `name` | `string` | The plan-only team name. |
| `planningStyle` | `'Scrum'\|'Kanban'` | The planning style for the plan-only team. This is "Scrum" or "Kanban". |
| `capacity` | `float` | The capacity for the plan-only team. |
| `issueSourceId` | `int` | The ID of the issue source for the plan-only team. |
| `memberAccountIds` | `?list<string>` | The account IDs of the plan-only team members. |
| `sprintLength` | `int` | The sprint length for the plan-only team. |


## Update Plan-only Team
<a name="updatePlanOnlyTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-planonly-plan-only-team-id-put

Updates any of the following planning settings of a plan-only team using "JSON Patch"

 - name
 - planningStyle
 - issueSourceId
 - sprintLength
 - capacity
 - memberAccountIds

**"Permissions" required:** *Administer Jira* "global permission"

*Note that "add" operations do not respect array indexes in target locations.
Call the "Get plan-only team" endpoint to find out the order of array elements.*
See: https://datatracker.ietf.org/doc/html/rfc6902
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->updatePlanOnlyTeam(
    planId: 1234,
    planOnlyTeamId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `planOnlyTeamId` | `int` | The ID of the plan-only team. |

#### Response

`true`
## Delete Plan-only Team
<a name="deletePlanOnlyTeam"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-teams-in-plan/#api-rest-api-3-plans-plan-plan-id-team-planonly-plan-only-team-id-delete

Deletes a plan-only team and their planning settings

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deletePlanOnlyTeam(
    planId: 1234,
    planOnlyTeamId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `planId` | `int` | The ID of the plan. |
| `planOnlyTeamId` | `int` | The ID of the plan-only team. |

#### Response

`true`
