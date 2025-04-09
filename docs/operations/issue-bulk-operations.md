# Issue Bulk Operations

Source: [`Jira\Client\Operations\IssueBulkOperations`](/src/Operations/IssueBulkOperations.php)

## Operations

- [Bulk Delete Issues](#submitBulkDelete)
- [Get Bulk Editable Fields](#getBulkEditableFields)
- [Bulk Edit Issues](#submitBulkEdit)
- [Bulk Move Issues](#submitBulkMove)
- [Get Available Transitions](#getAvailableTransitions)
- [Bulk Transition Issue Statuses](#submitBulkTransition)
- [Bulk Unwatch Issues](#submitBulkUnwatch)
- [Bulk Watch Issues](#submitBulkWatch)
- [Get Bulk Issue Operation Progress](#getBulkOperationProgress)

## Bulk Delete Issues
<a name="submitBulkDelete"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-delete-post

Use this API to submit a bulk delete request.
You can delete up to 1,000 issues in a single operation

**"Permissions" required:**

 - Global bulk change "permission"
 - Delete "issues permission" in all projects that contain the selected issues
 - Browse "project permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/#Delete-issues/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SubmittedBulkOperation $response */
$response = $client->submitBulkDelete(new Schema\IssueBulkDeletePayload(
    selectedIssueIdsOrKeys: [
                '10001',
                '10002',
            ],
    sendBulkNotification: false,
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueBulkDeletePayload`](/docs/schema/issue-bulk-delete-payload.md)

Issue Bulk Delete Payload

| Property | Type | Description |
| --- | --- | --- |
| `selectedIssueIdsOrKeys` | `list<string>` | List of issue IDs or keys which are to be bulk deleted. These IDs or keys can be from different projects and issue types. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being deleted.<br/><br/>If `true`, dispatches a bulk notification email to users about the updates. |

#### Response

Source: [`Jira\Client\Schema\SubmittedBulkOperation`](/docs/schema/submitted-bulk-operation.md)

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` |  |


## Get Bulk Editable Fields
<a name="getBulkEditableFields"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-fields-get

Use this API to get a list of fields visible to the user to perform bulk edit operations.
You can pass single or multiple issues in the query to get eligible editable fields.
This API uses pagination to return responses, delivering 50 fields at a time

**"Permissions" required:**

 - Global bulk change "permission"
 - Browse "project permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - Depending on the field, any field-specific permissions required to edit it.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\BulkEditGetFields $response */
$response = $client->getBulkEditableFields(
    issueIdsOrKeys: 'foo',
    searchText: null,
    endingBefore: null,
    startingAfter: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `string` | The IDs or keys of the issues to get editable fields from. |
| `searchText` | `?string` | (Optional)The text to search for in the editable fields. |
| `endingBefore` | `?string` | (Optional)The end cursor for use in pagination. |
| `startingAfter` | `?string` | (Optional)The start cursor for use in pagination. |

#### Response

Source: [`Jira\Client\Schema\BulkEditGetFields`](/docs/schema/bulk-edit-get-fields.md)

Bulk Edit Get Fields Response.

| Property | Type | Description |
| --- | --- | --- |
| `endingBefore` | `string` | The end cursor for use in pagination. |
| `fields` | [`?list<IssueBulkEditField>`](/docs/schema/issue-bulk-edit-field.md) | List of all the fields |
| `startingAfter` | `string` | The start cursor for use in pagination. |


## Bulk Edit Issues
<a name="submitBulkEdit"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-fields-post

Use this API to submit a bulk edit request and simultaneously edit multiple issues.
There are limits applied to the number of issues and fields that can be edited.
A single request can accommodate a maximum of 1000 issues (including subtasks) and 200 fields

**"Permissions" required:**

 - Global bulk change "permission"
 - Browse "project permission" in all projects that contain the selected issues
 - Edit "issues permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueBulkEditPayload`](/docs/schema/issue-bulk-edit-payload.md)

Issue Bulk Edit Payload

| Property | Type | Description |
| --- | --- | --- |
| `editedFieldsInput` | [`JiraIssueFields`](/docs/schema/jira-issue-fields.md) | An object that defines the values to be updated in specified fields of an issue. The structure and content of this parameter vary depending on the type of field being edited. Although the order is not significant, ensure that field IDs align with those in selectedActions. |
| `selectedActions` | `list<string>` | List of all the field IDs that are to be bulk edited. Each field ID in this list corresponds to a specific attribute of an issue that is set to be modified in the bulk edit operation. The relevant field ID can be obtained by calling the Bulk Edit Get Fields REST API (documentation available on this page itself). |
| `selectedIssueIdsOrKeys` | `list<string>` | List of issue IDs or keys which are to be bulk edited. These IDs or keys can be from different projects and issue types. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being edited.<br/><br/>If `true`, dispatches a bulk notification email to users about the updates. |

#### Response

Source: [`Jira\Client\Schema\SubmittedBulkOperation`](/docs/schema/submitted-bulk-operation.md)

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` |  |


## Bulk Move Issues
<a name="submitBulkMove"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-move-post

Use this API to submit a bulk issue move request.
You can move multiple issues, but they must all be moved to and from a single project, issue type, and parent.
You can't move more than 1000 issues (including subtasks) at once

#### Scenarios: ####

This is an early version of the API and it doesn't have full feature parity with the Bulk Move UI experience

 - Moving issue of type A to issue of type B in the same project or a different project: `SUPPORTED`
 - Moving multiple issues of type A in one project to multiple issues of type B in the same project or a different project: **`SUPPORTED`**
 - Moving a standard parent issue of type A with its multiple subtask issue types in one project to standard issue of type B and multiple subtask issue types in the same project or a different project: `SUPPORTED`
 - Moving an epic issue with its child issues to a different project without losing their relation: `NOT SUPPORTED`  
    (Workaround: Move them individually and stitch the relationship back with the Bulk Edit API)

#### Limits applied to bulk issue moves: ####

When using the bulk move, keep in mind that there are limits on the number of issues and fields you can include

 - You can move up to 1,000 issues in a single operation, including any subtasks
 - All issues must originate from the same project and share the same issue type and parent
 - The total combined number of fields across all issues must not exceed 1,500,000.
For example, if each issue includes 15,000 fields, then the maximum number of issues that can be moved is 100

**"Permissions" required:**

 - Global bulk change "permission"
 - Move "issues permission" in source projects
 - Create "issues permission" in destination projects
 - Browse "project permission" in destination projects, if moving subtasks only
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SubmittedBulkOperation $response */
$response = $client->submitBulkMove(new Schema\IssueBulkMovePayload(
    sendBulkNotification: true,
    targetToSourcesMapping: [
                'PROJECT-KEY,10001' => [
                    'inferClassificationDefaults' => '',
                    'inferFieldDefaults' => '',
                    'inferStatusDefaults' => '',
                    'inferSubtaskTypeDefault' => '1',
                    'issueIdsOrKeys' => [
                        0 => 'ISSUE-1',
                    ],
                    'targetClassification' => [
                        0 => [
                            'classifications' => [
                                '5bfa70f7-4af1-44f5-9e12-1ce185f15a38' => [
                                    0 => 'bd58e74c-c31b-41a7-ba69-9673ebd9dae9',
                                    1 => '-1',
                                ],
                            ],
                        ],
                    ],
                    'targetMandatoryFields' => [
                        0 => [
                            'fields' => [
                                'customfield_10000' => [
                                    'retain' => '',
                                    'type' => 'raw',
                                    'value' => [
                                        0 => 'value-1',
                                        1 => 'value-2',
                                    ],
                                ],
                                'description' => [
                                    'retain' => '1',
                                    'type' => 'adf',
                                    'value' => [
                                        'content' => [
                                            0 => [
                                                'content' => [
                                                    0 => [
                                                        'text' => 'New description value',
                                                        'type' => 'text',
                                                    ],
                                                ],
                                                'type' => 'paragraph',
                                            ],
                                        ],
                                        'type' => 'doc',
                                        'version' => '1',
                                    ],
                                ],
                                'fixVersions' => [
                                    'retain' => '',
                                    'type' => 'raw',
                                    'value' => [
                                        0 => '10009',
                                    ],
                                ],
                                'labels' => [
                                    'retain' => '',
                                    'type' => 'raw',
                                    'value' => [
                                        0 => 'label-1',
                                        1 => 'label-2',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'targetStatus' => [
                        0 => [
                            'statuses' => [
                                10001 => [
                                    0 => '10002',
                                    1 => '10003',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueBulkMovePayload`](/docs/schema/issue-bulk-move-payload.md)

Issue Bulk Move Payload

| Property | Type | Description |
| --- | --- | --- |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being moved.<br/><br/>If `true`, dispatches a bulk notification email to users about the updates. |
| `targetToSourcesMapping` | [`array<string,TargetToSourcesMapping>`](/docs/schema/target-to-sources-mapping.md) | An object representing the mapping of issues and data related to destination entities, like fields and statuses, that are required during a bulk move.<br/><br/>The key is a string that is created by concatenating the following three entities in order, separated by commas. The format is `<project ID or key>,<issueType ID>,<parent ID or key>`. It should be unique across mappings provided in the payload. If you provide multiple mappings for the same key, only one will be processed. However, the operation won't fail, so the error may be hard to track down.<br/><br/> *  ***Destination project*** (Required): ID or key of the project to which the issues are being moved.<br/> *  ***Destination issueType*** (Required): ID of the issueType to which the issues are being moved.<br/> *  ***Destination parent ID or key*** (Optional): ID or key of the issue which will become the parent of the issues being moved. Only required when the destination issueType is a subtask. |

#### Response

Source: [`Jira\Client\Schema\SubmittedBulkOperation`](/docs/schema/submitted-bulk-operation.md)

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` |  |


## Get Available Transitions
<a name="getAvailableTransitions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-transition-get

Use this API to retrieve a list of transitions available for the specified issues that can be used or bulk transition operations.
You can submit either single or multiple issues in the query to obtain the available transitions

The response will provide the available transitions for issues, organized by their respective workflows.
**Only the transitions that are common among the issues within that workflow and do not involve any additional field updates will be included.** For bulk transitions that require additional field updates, please utilise the Jira Cloud UI

You can request available transitions for up to 1,000 issues in a single operation.
This API uses pagination to return responses, delivering 50 workflows at a time

**"Permissions" required:**

 - Global bulk change "permission"
 - Transition "issues permission" in all projects that contain the selected issues
 - Browse "project permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/#Transition-issues/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\BulkTransitionGetAvailableTransitions $response */
$response = $client->getAvailableTransitions(
    issueIdsOrKeys: 'foo',
    endingBefore: null,
    startingAfter: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdsOrKeys` | `string` | Comma (,) separated Ids or keys of the issues to get transitions available for them. |
| `endingBefore` | `?string` | (Optional)The end cursor for use in pagination. |
| `startingAfter` | `?string` | (Optional)The start cursor for use in pagination. |

#### Response

Source: [`Jira\Client\Schema\BulkTransitionGetAvailableTransitions`](/docs/schema/bulk-transition-get-available-transitions.md)

Bulk Transition Get Available Transitions Response.

| Property | Type | Description |
| --- | --- | --- |
| `availableTransitions` | [`?list<IssueBulkTransitionForWorkflow>`](/docs/schema/issue-bulk-transition-for-workflow.md) | List of available transitions for bulk transition operation for requested issues grouped by workflow |
| `endingBefore` | `string` | The end cursor for use in pagination. |
| `startingAfter` | `string` | The start cursor for use in pagination. |


## Bulk Transition Issue Statuses
<a name="submitBulkTransition"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-transition-post

Use this API to submit a bulk issue status transition request.
You can transition multiple issues, alongside with their valid transition Ids.
You can transition up to 1,000 issues in a single operation

**"Permissions" required:**

 - Global bulk change "permission"
 - Transition "issues permission" in all projects that contain the selected issues
 - Browse "project permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/#Transition-issues/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SubmittedBulkOperation $response */
$response = $client->submitBulkTransition(new Schema\IssueBulkTransitionPayload(
    bulkTransitionInputs: [
                [
                    'selectedIssueIdsOrKeys' => [
                        '10001',
                        '10002',
                    ],
                    'transitionId' => '11',
                ],
                [
                    'selectedIssueIdsOrKeys' => [
                        'TEST-1',
                    ],
                    'transitionId' => '2',
                ],
            ],
    sendBulkNotification: false,
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueBulkTransitionPayload`](/docs/schema/issue-bulk-transition-payload.md)

Issue Bulk Transition Payload

| Property | Type | Description |
| --- | --- | --- |
| `bulkTransitionInputs` | [`list<BulkTransitionSubmitInput>`](/docs/schema/bulk-transition-submit-input.md) | List of objects and each object has two properties:<br/><br/> *  Issues that will be bulk transitioned.<br/> *  TransitionId that corresponds to a specific transition of issues that share the same workflow. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being transitioned.<br/><br/>If `true`, dispatches a bulk notification email to users about the updates. |

#### Response

Source: [`Jira\Client\Schema\SubmittedBulkOperation`](/docs/schema/submitted-bulk-operation.md)

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` |  |


## Bulk Unwatch Issues
<a name="submitBulkUnwatch"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-unwatch-post

Use this API to submit a bulk unwatch request.
You can unwatch up to 1,000 issues in a single operation

**"Permissions" required:**

 - Global bulk change "permission"
 - Browse "project permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SubmittedBulkOperation $response */
$response = $client->submitBulkUnwatch(new Schema\IssueBulkWatchOrUnwatchPayload(
    selectedIssueIdsOrKeys: [
                '10001',
                '10002',
            ],
    sendBulkNotification: false,
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueBulkWatchOrUnwatchPayload`](/docs/schema/issue-bulk-watch-or-unwatch-payload.md)

Issue Bulk Watch Or Unwatch Payload

| Property | Type | Description |
| --- | --- | --- |
| `selectedIssueIdsOrKeys` | `list<string>` | List of issue IDs or keys which are to be bulk watched or unwatched. These IDs or keys can be from different projects and issue types. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being watched or unwatched.<br/><br/>If `true`, dispatches a bulk notification email to users about the updates. |

#### Response

Source: [`Jira\Client\Schema\SubmittedBulkOperation`](/docs/schema/submitted-bulk-operation.md)

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` |  |


## Bulk Watch Issues
<a name="submitBulkWatch"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-issues-watch-post

Use this API to submit a bulk watch request.
You can watch up to 1,000 issues in a single operation

**"Permissions" required:**

 - Global bulk change "permission"
 - Browse "project permission" in all projects that contain the selected issues
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SubmittedBulkOperation $response */
$response = $client->submitBulkWatch(new Schema\IssueBulkWatchOrUnwatchPayload(
    selectedIssueIdsOrKeys: [
                '10001',
                '10002',
            ],
    sendBulkNotification: false,
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueBulkWatchOrUnwatchPayload`](/docs/schema/issue-bulk-watch-or-unwatch-payload.md)

Issue Bulk Watch Or Unwatch Payload

| Property | Type | Description |
| --- | --- | --- |
| `selectedIssueIdsOrKeys` | `list<string>` | List of issue IDs or keys which are to be bulk watched or unwatched. These IDs or keys can be from different projects and issue types. |
| `sendBulkNotification` | `bool` | A boolean value that indicates whether to send a bulk change notification when the issues are being watched or unwatched.<br/><br/>If `true`, dispatches a bulk notification email to users about the updates. |

#### Response

Source: [`Jira\Client\Schema\SubmittedBulkOperation`](/docs/schema/submitted-bulk-operation.md)

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` |  |


## Get Bulk Issue Operation Progress
<a name="getBulkOperationProgress"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-bulk-operations/#api-rest-api-3-bulk-queue-task-id-get

Use this to get the progress state for the specified bulk operation `taskId`

**"Permissions" required:**

 - Global bulk change "permission"

If the task is running, this resource will return:

    {"taskId":"10779","status":"RUNNING","progressPercent":65,"submittedBy":{"accountId":"5b10a2844c20165700ede21g"},"created":1690180055963,"started":1690180056206,"updated":169018005829}

If the task has completed, then this resource will return:

    {"processedAccessibleIssues":[10001,10002],"created":1709189449954,"progressPercent":100,"started":1709189450154,"status":"COMPLETE","submittedBy":{"accountId":"5b10a2844c20165700ede21g"},"invalidOrInaccessibleIssueCount":0,"taskId":"10000","totalIssueCount":2,"updated":1709189450354}

**Note:** You can view task progress for up to 14 days from creation.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-global-permissions/

### Example

```php
/** @var Schema\BulkOperationProgress $response */
$response = $client->getBulkOperationProgress(
    taskId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `taskId` | `string` | The ID of the task. |

#### Response

Source: [`Jira\Client\Schema\BulkOperationProgress`](/docs/schema/bulk-operation-progress.md)

| Property | Type | Description |
| --- | --- | --- |
| `created` | `string` | A timestamp of when the task was submitted. |
| `failedAccessibleIssues` | `array<string,list<string>>` | Map of issue IDs for which the operation failed and that the user has permission to view, to their one or more reasons for failure. These reasons are open-ended text descriptions of the error and are not selected from a predefined list of standard reasons. |
| `invalidOrInaccessibleIssueCount` | `int` | The number of issues that are either invalid or issues that the user doesn't have permission to view, regardless of the success or failure of the operation. |
| `processedAccessibleIssues` | `?list<int>` | List of issue IDs for which the operation was successful and that the user has permission to view. |
| `progressPercent` | `int` | Progress of the task as a percentage. |
| `started` | `string` | A timestamp of when the task was started. |
| `status` | `'ENQUEUED'\|`<br/>`'RUNNING'\|`<br/>`'COMPLETE'\|`<br/>`'FAILED'\|`<br/>`'CANCEL_REQUESTED'\|`<br/>`'CANCELLED'\|`<br/>`'DEAD'\|`<br/>`null` | The status of the task. |
| `submittedBy` | [`User`](/docs/schema/user.md) |  |
| `taskId` | `string` | The ID of the task. |
| `totalIssueCount` | `int` | The number of issues that the bulk operation was attempted on. |
| `updated` | `string` | A timestamp of when the task progress was last updated. |
