# Workflow Transition Properties

Source: [`Jira\Client\Operations\WorkflowTransitionProperties`](/src/Operations/WorkflowTransitionProperties.php)

## Operations

- [Get Workflow Transition Properties](#getWorkflowTransitionProperties)
- [Update Workflow Transition Property](#updateWorkflowTransitionProperty)
- [Create Workflow Transition Property](#createWorkflowTransitionProperty)
- [Delete Workflow Transition Property](#deleteWorkflowTransitionProperty)

## Get Workflow Transition Properties
<a name="getWorkflowTransitionProperties"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-properties/#api-rest-api-3-workflow-transitions-transition-id-properties-get

Returns the properties on a workflow transition.
Transition properties are used to change the behavior of a transition.
For more information, see "Transition properties" and "Workflow properties"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
See: https://confluence.atlassian.com/x/JYlKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getWorkflowTransitionProperties(
    transitionId: 1234,
    workflowName: 'foo',
    includeReservedKeys: false,
    key: null,
    workflowMode: 'live',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `transitionId` | `int` | The ID of the transition. To get the ID, view the workflow in text mode in the Jira administration console. The ID is shown next to the transition. |
| `workflowName` | `string` | The name of the workflow that the transition belongs to. |
| `includeReservedKeys` | `?bool` | Some properties with keys that have the *jira.* prefix are reserved, which means they are not editable. To include these properties in the results, set this parameter to *true*. |
| `key` | `?string` | The key of the property being returned, also known as the name of the property. If this parameter is not specified, all properties on the transition are returned. |
| `workflowMode` | `'live'\|'draft'\|null` | The workflow status. Set to *live* for active and inactive workflows, or *draft* for draft workflows. |

#### Response


## Update Workflow Transition Property
<a name="updateWorkflowTransitionProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-properties/#api-rest-api-3-workflow-transitions-transition-id-properties-put

Updates a workflow transition by changing the property value.
Trying to update a property that does not exist results in a new property being added to the transition.
Transition properties are used to change the behavior of a transition.
For more information, see "Transition properties" and "Workflow properties"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
See: https://confluence.atlassian.com/x/JYlKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowTransitionProperty $response */
$response = $client->updateWorkflowTransitionProperty(
    request: new Schema\WorkflowTransitionProperty(
        value: 'createissue',
    )
    transitionId: 1234,
    key: 'foo',
    workflowName: 'foo',
    workflowMode: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowTransitionProperty`](/docs/schema/workflow-transition-property.md)

Details about the server Jira is running on.

| Property | Type | Description |
| --- | --- | --- |
| `value` | `string` | The value of the transition property. |
| `id` | `string` | The ID of the transition property. |
| `key` | `string` | The key of the transition property. Also known as the name of the transition property. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `transitionId` | `int` | The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition. |
| `key` | `string` | The key of the property being updated, also known as the name of the property. Set this to the same value as the `key` defined in the request body. |
| `workflowName` | `string` | The name of the workflow that the transition belongs to. |
| `workflowMode` | `'live'\|'draft'\|null` | The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited. |

#### Response

Source: [`Jira\Client\Schema\WorkflowTransitionProperty`](/docs/schema/workflow-transition-property.md)

Details about the server Jira is running on.

| Property | Type | Description |
| --- | --- | --- |
| `value` | `string` | The value of the transition property. |
| `id` | `string` | The ID of the transition property. |
| `key` | `string` | The key of the transition property. Also known as the name of the transition property. |


## Create Workflow Transition Property
<a name="createWorkflowTransitionProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-properties/#api-rest-api-3-workflow-transitions-transition-id-properties-post

Adds a property to a workflow transition.
Transition properties are used to change the behavior of a transition.
For more information, see "Transition properties" and "Workflow properties"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
See: https://confluence.atlassian.com/x/JYlKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowTransitionProperty $response */
$response = $client->createWorkflowTransitionProperty(
    request: new Schema\WorkflowTransitionProperty(
        value: 'createissue',
    )
    transitionId: 1234,
    key: 'foo',
    workflowName: 'foo',
    workflowMode: 'live',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowTransitionProperty`](/docs/schema/workflow-transition-property.md)

Details about the server Jira is running on.

| Property | Type | Description |
| --- | --- | --- |
| `value` | `string` | The value of the transition property. |
| `id` | `string` | The ID of the transition property. |
| `key` | `string` | The key of the transition property. Also known as the name of the transition property. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `transitionId` | `int` | The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition. |
| `key` | `string` | The key of the property being added, also known as the name of the property. Set this to the same value as the `key` defined in the request body. |
| `workflowName` | `string` | The name of the workflow that the transition belongs to. |
| `workflowMode` | `'live'\|'draft'\|null` | The workflow status. Set to *live* for inactive workflows or *draft* for draft workflows. Active workflows cannot be edited. |

#### Response

Source: [`Jira\Client\Schema\WorkflowTransitionProperty`](/docs/schema/workflow-transition-property.md)

Details about the server Jira is running on.

| Property | Type | Description |
| --- | --- | --- |
| `value` | `string` | The value of the transition property. |
| `id` | `string` | The ID of the transition property. |
| `key` | `string` | The key of the transition property. Also known as the name of the transition property. |


## Delete Workflow Transition Property
<a name="deleteWorkflowTransitionProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-properties/#api-rest-api-3-workflow-transitions-transition-id-properties-delete

Deletes a property from a workflow transition.
Transition properties are used to change the behavior of a transition.
For more information, see "Transition properties" and "Workflow properties"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
See: https://confluence.atlassian.com/x/JYlKLg
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `transitionId` | `int` | The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition. |
| `key` | `string` | The name of the transition property to delete, also known as the name of the property. |
| `workflowName` | `string` | The name of the workflow that the transition belongs to. |
| `workflowMode` | `'live'\|'draft'\|null` | The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited. |

#### Response

`true`
