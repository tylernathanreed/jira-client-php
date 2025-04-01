# Workflows

Source: [`Jira\Client\Operations\Workflows`](/src/Operations/Workflows.php)

## Operations

- [Get All Workflows](#getAllWorkflows)
- [Create Workflow](#createWorkflow)
- [Get Workflows Paginated](#getWorkflowsPaginated)
- [Delete Inactive Workflow](#deleteInactiveWorkflow)
- [Get Issue Types In A Project That Are Using A Given Workflow](#getWorkflowProjectIssueTypeUsages)
- [Get Projects Using A Given Workflow](#getProjectUsagesForWorkflow)
- [Get Workflow Schemes Which Are Using A Given Workflow](#getWorkflowSchemeUsagesForWorkflow)
- [Bulk Get Workflows](#readWorkflows)
- [Get Available Workflow Capabilities](#workflowCapabilities)
- [Bulk Create Workflows](#createWorkflows)
- [Validate Create Workflows](#validateCreateWorkflows)
- [Search Workflows](#searchWorkflows)
- [Bulk Update Workflows](#updateWorkflows)
- [Validate Update Workflows](#validateUpdateWorkflows)

## Get All Workflows
<a name="getAllWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-get

Returns all workflows in Jira or a workflow.
Deprecated, use "Get workflows paginated"

If the `workflowName` parameter is specified, the workflow is returned as an object (not in an array).
Otherwise, an array of workflow objects is returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getAllWorkflows(
    workflowName: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `workflowName` | `?string` | The name of the workflow to be returned. Only one workflow can be specified. |

#### Response


## Create Workflow
<a name="createWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-post

Creates a workflow.
You can define transition rules using the shapes detailed in the following sections.
If no transitional rules are specified the default system transition rules are used.
Note: This only applies to company-managed scoped workflows.
Use "bulk create workflows" to create both team and company-managed scoped workflows

#### Conditions ####

Conditions enable workflow rules that govern whether a transition can execute

##### Always false condition #####

A condition that always fails

    {
       "type": "AlwaysFalseCondition"
     }

##### Block transition until approval #####

A condition that blocks issue transition if there is a pending approval

    {
       "type": "BlockInProgressApprovalCondition"
     }

##### Compare number custom field condition #####

A condition that allows transition if a comparison between a number custom field and a value is true

    {
       "type": "CompareNumberCFCondition",
       "configuration": {
         "comparator": "=",
         "fieldId": "customfield_10029",
         "fieldValue": 2
       }
     }

 - `comparator` One of the supported comparator: `=`, `>`, and `<`
 - `fieldId` The custom numeric field ID.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:float`
     - `com.pyxis.greenhopper.jira:jsw-story-points`
 - `fieldValue` The value for comparison

##### Hide from user condition #####

A condition that hides a transition from users.
The transition can only be triggered from a workflow function or REST API operation

    {
       "type": "RemoteOnlyCondition"
     }

##### Only assignee condition #####

A condition that allows only the assignee to execute a transition

    {
       "type": "AllowOnlyAssignee"
     }

##### Only Bamboo notifications workflow condition (deprecated) #####

A condition that makes the transition available only to Bamboo build notifications

    {
       "type": "OnlyBambooNotificationsCondition"
     }

##### Only reporter condition #####

A condition that allows only the reporter to execute a transition

    {
       "type": "AllowOnlyReporter"
     }

##### Permission condition #####

A condition that allows only users with a permission to execute a transition

    {
       "type": "PermissionCondition",
       "configuration": {
           "permissionKey": "BROWSE_PROJECTS"
       }
     }

 - `permissionKey` The permission required to perform the transition.
Allowed values: "built-in" or app defined permissions

##### Previous status condition #####

A condition that allows a transition based on whether an issue has or has not transitioned through a status

    {
       "type": "PreviousStatusCondition",
       "configuration": {
         "ignoreLoopTransitions": true,
         "includeCurrentStatus": true,
         "mostRecentStatusOnly": true,
         "reverseCondition": true,
         "previousStatus": {
           "id": "5"
         }
       }
     }

By default this condition allows the transition if the status, as defined by its ID in the `previousStatus` object, matches any previous issue status, unless:

 - `ignoreLoopTransitions` is `true`, then loop transitions (from and to the same status) are ignored
 - `includeCurrentStatus` is `true`, then the current issue status is also checked
 - `mostRecentStatusOnly` is `true`, then only the issue's preceding status (the one immediately before the current status) is checked
 - `reverseCondition` is `true`, then the status must not be present

##### Separation of duties condition #####

A condition that prevents a user to perform the transition, if the user has already performed a transition on the issue

    {
       "type": "SeparationOfDutiesCondition",
       "configuration": {
         "fromStatus": {
           "id": "5"
         },
         "toStatus": {
           "id": "6"
         }
       }
     }

 - `fromStatus` OPTIONAL.
An object containing the ID of the source status of the transition that is blocked.
If omitted any transition to `toStatus` is blocked
 - `toStatus` An object containing the ID of the target status of the transition that is blocked

##### Subtask blocking condition #####

A condition that blocks transition on a parent issue if any of its subtasks are in any of one or more statuses

    {
       "type": "SubTaskBlockingCondition",
       "configuration": {
         "statuses": [
           {
             "id": "1"
           },
           {
             "id": "3"
           }
         ]
       }
     }

 - `statuses` A list of objects containing status IDs

##### User is in any group condition #####

A condition that allows users belonging to any group from a list of groups to execute a transition

    {
       "type": "UserInAnyGroupCondition",
       "configuration": {
         "groups": [
           "administrators",
           "atlassian-addons-admin"
         ]
       }
     }

 - `groups` A list of group names

##### User is in any project role condition #####

A condition that allows only users with at least one project roles from a list of project roles to execute a transition

    {
       "type": "InAnyProjectRoleCondition",
       "configuration": {
         "projectRoles": [
           {
             "id": "10002"
           },
           {
             "id": "10003"
           },
           {
             "id": "10012"
           },
           {
             "id": "10013"
           }
         ]
       }
     }

 - `projectRoles` A list of objects containing project role IDs

##### User is in custom field condition #####

A condition that allows only users listed in a given custom field to execute the transition

    {
       "type": "UserIsInCustomFieldCondition",
       "configuration": {
         "allowUserInField": false,
         "fieldId": "customfield_10010"
       }
     }

 - `allowUserInField` If `true` only a user who is listed in `fieldId` can perform the transition, otherwise, only a user who is not listed in `fieldId` can perform the transition
 - `fieldId` The ID of the field containing the list of users

##### User is in group condition #####

A condition that allows users belonging to a group to execute a transition

    {
       "type": "UserInGroupCondition",
       "configuration": {
         "group": "administrators"
       }
     }

 - `group` The name of the group

##### User is in group custom field condition #####

A condition that allows users belonging to a group specified in a custom field to execute a transition

    {
       "type": "InGroupCFCondition",
       "configuration": {
         "fieldId": "customfield_10012"
       }
     }

 - `fieldId` The ID of the field.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`
     - `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`
     - `com.atlassian.jira.plugin.system.customfieldtypes:select`
     - `com.atlassian.jira.plugin.system.customfieldtypes:multiselect`
     - `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`
     - `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`
     - `com.pyxis.greenhopper.jira:gh-epic-status`

##### User is in project role condition #####

A condition that allows users with a project role to execute a transition

    {
       "type": "InProjectRoleCondition",
       "configuration": {
         "projectRole": {
           "id": "10002"
         }
       }
     }

 - `projectRole` An object containing the ID of a project role

##### Value field condition #####

A conditions that allows a transition to execute if the value of a field is equal to a constant value or simply set

    {
       "type": "ValueFieldCondition",
       "configuration": {
         "fieldId": "assignee",
         "fieldValue": "qm:6e1ecee6-8e64-4db6-8c85-916bb3275f51:54b56885-2bd2-4381-8239-78263442520f",
         "comparisonType": "NUMBER",
         "comparator": "="
       }
     }

 - `fieldId` The ID of a field used in the comparison
 - `fieldValue` The expected value of the field
 - `comparisonType` The type of the comparison.
Allowed values: `STRING`, `NUMBER`, `DATE`, `DATE_WITHOUT_TIME`, or `OPTIONID`
 - `comparator` One of the supported comparator: `>`, `>=`, `=`, `<=`, `<`, `!=`

**Notes:**

 - If you choose the comparison type `STRING`, only `=` and `!=` are valid options
 - You may leave `fieldValue` empty when comparison type is `!=` to indicate that a value is required in the field
 - For date fields without time format values as `yyyy-MM-dd`, and for those with time as `yyyy-MM-dd HH:mm`.
For example, for July 16 2021 use `2021-07-16`, for 8:05 AM use `2021-07-16 08:05`, and for 4 PM: `2021-07-16 16:00`

#### Validators ####

Validators check that any input made to the transition is valid before the transition is performed

##### Date field validator #####

A validator that compares two dates

    {
       "type": "DateFieldValidator",
       "configuration": {
           "comparator": ">",
           "date1": "updated",
           "date2": "created",
           "expression": "1d",
           "includeTime": true
         }
     }

 - `comparator` One of the supported comparator: `>`, `>=`, `=`, `<=`, `<`, or `!=`
 - `date1` The date field to validate.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     - `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     - `com.atlassian.jpo:jpo-custom-field-baseline-end`
     - `com.atlassian.jpo:jpo-custom-field-baseline-start`
     - `duedate`
     - `created`
     - `updated`
     - `resolutiondate`
 - `date2` The second date field.
Required, if `expression` is not passed.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     - `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     - `com.atlassian.jpo:jpo-custom-field-baseline-end`
     - `com.atlassian.jpo:jpo-custom-field-baseline-start`
     - `duedate`
     - `created`
     - `updated`
     - `resolutiondate`
 - `expression` An expression specifying an offset.
Required, if `date2` is not passed.
Offsets are built with a number, with `-` as prefix for the past, and one of these time units: `d` for day, `w` for week, `m` for month, or `y` for year.
For example, -2d means two days into the past and 1w means one week into the future.
The `now` keyword enables a comparison with the current date
 - `includeTime` If `true`, then the time part of the data is included for the comparison.
If the field doesn't have a time part, 00:00:00 is used

##### Windows date validator #####

A validator that checks that a date falls on or after a reference date and before or on the reference date plus a number of days

    {
       "type": "WindowsDateValidator",
       "configuration": {
           "date1": "customfield_10009",
           "date2": "created",
           "windowsDays": 5
         }
     }

 - `date1` The date field to validate.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     - `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     - `com.atlassian.jpo:jpo-custom-field-baseline-end`
     - `com.atlassian.jpo:jpo-custom-field-baseline-start`
     - `duedate`
     - `created`
     - `updated`
     - `resolutiondate`
 - `date2` The reference date.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     - `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     - `com.atlassian.jpo:jpo-custom-field-baseline-end`
     - `com.atlassian.jpo:jpo-custom-field-baseline-start`
     - `duedate`
     - `created`
     - `updated`
     - `resolutiondate`
 - `windowsDays` A positive integer indicating a number of days

##### Field required validator #####

A validator that checks fields are not empty.
By default, if a field is not included in the current context it's ignored and not validated

    {
         "type": "FieldRequiredValidator",
         "configuration": {
             "ignoreContext": true,
             "errorMessage": "Hey",
             "fieldIds": [
                 "versions",
                 "customfield_10037",
                 "customfield_10003"
             ]
         }
     }

 - `ignoreContext` If `true`, then the context is ignored and all the fields are validated
 - `errorMessage` OPTIONAL.
The error message displayed when one or more fields are empty.
A default error message is shown if an error message is not provided
 - `fieldIds` The list of fields to validate

##### Field changed validator #####

A validator that checks that a field value is changed.
However, this validation can be ignored for users from a list of groups

    {
         "type": "FieldChangedValidator",
         "configuration": {
             "fieldId": "comment",
             "errorMessage": "Hey",
             "exemptedGroups": [
                 "administrators",
                 "atlassian-addons-admin"
             ]
         }
     }

 - `fieldId` The ID of a field
 - `errorMessage` OPTIONAL.
The error message displayed if the field is not changed.
A default error message is shown if the error message is not provided
 - `exemptedGroups` OPTIONAL.
The list of groups

##### Field has single value validator #####

A validator that checks that a multi-select field has only one value.
Optionally, the validation can ignore values copied from subtasks

    {
         "type": "FieldHasSingleValueValidator",
         "configuration": {
             "fieldId": "attachment,
             "excludeSubtasks": true
         }
     }

 - `fieldId` The ID of a field
 - `excludeSubtasks` If `true`, then values copied from subtasks are ignored

##### Parent status validator #####

A validator that checks the status of the parent issue of a subtask.
Ìf the issue is not a subtask, no validation is performed

    {
         "type": "ParentStatusValidator",
         "configuration": {
             "parentStatuses": [
                 {
                   "id":"1"
                 },
                 {
                   "id":"2"
                 }
             ]
         }
     }

 - `parentStatus` The list of required parent issue statuses

##### Permission validator #####

A validator that checks the user has a permission

    {
       "type": "PermissionValidator",
       "configuration": {
           "permissionKey": "ADMINISTER_PROJECTS"
       }
     }

 - `permissionKey` The permission required to perform the transition.
Allowed values: "built-in" or app defined permissions

##### Previous status validator #####

A validator that checks if the issue has held a status

    {
       "type": "PreviousStatusValidator",
       "configuration": {
           "mostRecentStatusOnly": false,
           "previousStatus": {
               "id": "15"
           }
       }
     }

 - `mostRecentStatusOnly` If `true`, then only the issue's preceding status (the one immediately before the current status) is checked
 - `previousStatus` An object containing the ID of an issue status

##### Regular expression validator #####

A validator that checks the content of a field against a regular expression

    {
       "type": "RegexpFieldValidator",
       "configuration": {
           "regExp": "[0-9]",
           "fieldId": "customfield_10029"
       }
     }

 - `regExp`A regular expression
 - `fieldId` The ID of a field.
Allowed field types:
    
     - `com.atlassian.jira.plugin.system.customfieldtypes:select`
     - `com.atlassian.jira.plugin.system.customfieldtypes:multiselect`
     - `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`
     - `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`
     - `com.atlassian.jira.plugin.system.customfieldtypes:textarea`
     - `com.atlassian.jira.plugin.system.customfieldtypes:textfield`
     - `com.atlassian.jira.plugin.system.customfieldtypes:url`
     - `com.atlassian.jira.plugin.system.customfieldtypes:float`
     - `com.pyxis.greenhopper.jira:jsw-story-points`
     - `com.pyxis.greenhopper.jira:gh-epic-status`
     - `description`
     - `summary`

##### User permission validator #####

A validator that checks if a user has a permission.
Obsolete.
You may encounter this validator when getting transition rules and can pass it when updating or creating rules, for example, when you want to duplicate the rules from a workflow on a new workflow

    {
         "type": "UserPermissionValidator",
         "configuration": {
             "permissionKey": "BROWSE_PROJECTS",
             "nullAllowed": false,
             "username": "TestUser"
         }
     }

 - `permissionKey` The permission to be validated.
Allowed values: "built-in" or app defined permissions
 - `nullAllowed` If `true`, allows the transition when `username` is empty
 - `username` The username to validate against the `permissionKey`

#### Post functions ####

Post functions carry out any additional processing required after a Jira workflow transition is executed

##### Fire issue event function #####

A post function that fires an event that is processed by the listeners

    {
       "type": "FireIssueEventFunction",
       "configuration": {
         "event": {
           "id":"1"
         }
       }
     }

**Note:** If provided, this post function overrides the default `FireIssueEventFunction`.
Can be included once in a transition

 - `event` An object containing the ID of the issue event

##### Update issue status #####

A post function that sets issue status to the linked status of the destination workflow status

    {
       "type": "UpdateIssueStatusFunction"
     }

**Note:** This post function is a default function in global and directed transitions.
It can only be added to the initial transition and can only be added once

##### Create comment #####

A post function that adds a comment entered during the transition to an issue

    {
       "type": "CreateCommentFunction"
     }

**Note:** This post function is a default function in global and directed transitions.
It can only be added to the initial transition and can only be added once

##### Store issue #####

A post function that stores updates to an issue

    {
       "type": "IssueStoreFunction"
     }

**Note:** This post function can only be added to the initial transition and can only be added once

##### Assign to current user function #####

A post function that assigns the issue to the current user if the current user has the `ASSIGNABLE_USER` permission

    {
         "type": "AssignToCurrentUserFunction"
     }

**Note:** This post function can be included once in a transition

##### Assign to lead function #####

A post function that assigns the issue to the project or component lead developer

    {
         "type": "AssignToLeadFunction"
     }

**Note:** This post function can be included once in a transition

##### Assign to reporter function #####

A post function that assigns the issue to the reporter

    {
         "type": "AssignToReporterFunction"
     }

**Note:** This post function can be included once in a transition

##### Clear field value function #####

A post function that clears the value from a field

    {
       "type": "ClearFieldValuePostFunction",
       "configuration": {
         "fieldId": "assignee"
       }
     }

 - `fieldId` The ID of the field

##### Copy value from other field function #####

A post function that copies the value of one field to another, either within an issue or from parent to subtask

    {
       "type": "CopyValueFromOtherFieldPostFunction",
       "configuration": {
         "sourceFieldId": "assignee",
         "destinationFieldId": "creator",
         "copyType": "same"
       }
     }

 - `sourceFieldId` The ID of the source field
 - `destinationFieldId` The ID of the destination field
 - `copyType` Use `same` to copy the value from a field inside the issue, or `parent` to copy the value from the parent issue

##### Create Crucible review workflow function (deprecated) #####

A post function that creates a Crucible review for all unreviewed code for the issue

    {
         "type": "CreateCrucibleReviewWorkflowFunction"
     }

**Note:** This post function can be included once in a transition

##### Set issue security level based on user's project role function #####

A post function that sets the issue's security level if the current user has a project role

    {
       "type": "SetIssueSecurityFromRoleFunction",
       "configuration": {
         "projectRole": {
             "id":"10002"
         },
         "issueSecurityLevel": {
             "id":"10000"
         }
       }
     }

 - `projectRole` An object containing the ID of the project role
 - `issueSecurityLevel` OPTIONAL.
The object containing the ID of the security level.
If not passed, then the security level is set to `none`

##### Trigger a webhook function #####

A post function that triggers a webhook

    {
       "type": "TriggerWebhookFunction",
       "configuration": {
         "webhook": {
           "id": "1"
         }
       }
     }

 - `webhook` An object containing the ID of the webhook listener to trigger

##### Update issue custom field function #####

A post function that updates the content of an issue custom field

    {
       "type": "UpdateIssueCustomFieldPostFunction",
       "configuration": {
         "mode": "append",
         "fieldId": "customfield_10003",
         "fieldValue": "yikes"
       }
     }

 - `mode` Use `replace` to override the field content with `fieldValue` or `append` to add `fieldValue` to the end of the field content
 - `fieldId` The ID of the field
 - `fieldValue` The update content

##### Update issue field function #####

A post function that updates a simple issue field

    {
       "type": "UpdateIssueFieldFunction",
       "configuration": {
         "fieldId": "assignee",
         "fieldValue": "5f0c277e70b8a90025a00776"
       }
     }

 - `fieldId` The ID of the field.
Allowed field types:
    
     - `assignee`
     - `description`
     - `environment`
     - `priority`
     - `resolution`
     - `summary`
     - `timeoriginalestimate`
     - `timeestimate`
     - `timespent`
 - `fieldValue` The update value
 - If the `fieldId` is `assignee`, the `fieldValue` should be one of these values:
    
     - an account ID
     - `automatic`
     - a blank string, which sets the value to `unassigned`

#### Connect rules ####

Connect rules are conditions, validators, and post functions of a transition that are registered by Connect apps.
To create a rule registered by the app, the app must be enabled and the rule's module must exist

    {
       "type": "appKey__moduleKey",
       "configuration": {
         "value":"{\"isValid\":\"true\"}"
       }
     }

 - `type` A Connect rule key in a form of `appKey__moduleKey`
 - `value` The stringified JSON configuration of a Connect rule

#### Forge rules ####

Forge transition rules are not yet supported

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-create-post
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowIDs $response */
$response = $client->createWorkflow(new Schema\CreateWorkflowDetails(
    description: 'This is a workflow used for Stories and Tasks',
    name: 'Workflow 1',
    statuses: [
                [
                    'id' => '1',
                    'properties' => [
                        'jira.issue.editable' => 'false',
                    ],
                ],
                [
                    'id' => '2',
                ],
                [
                    'id' => '3',
                ],
            ],
    transitions: [
                [
                    'from' => [
                    ],
                    'name' => 'Created',
                    'to' => '1',
                    'type' => 'initial',
                ],
                [
                    'from' => [
                        '1',
                    ],
                    'name' => 'In progress',
                    'properties' => [
                        'custom-property' => 'custom-value',
                    ],
                    'rules' => [
                        'conditions' => [
                            'conditions' => [
                                [
                                    'type' => 'RemoteOnlyCondition',
                                ],
                                [
                                    'configuration' => [
                                        'groups' => [
                                            'developers',
                                            'qa-testers',
                                        ],
                                    ],
                                    'type' => 'UserInAnyGroupCondition',
                                ],
                            ],
                            'operator' => 'AND',
                        ],
                        'postFunctions' => [
                            [
                                'type' => 'AssignToCurrentUserFunction',
                            ],
                        ],
                    ],
                    'screen' => [
                        'id' => '10001',
                    ],
                    'to' => '2',
                    'type' => 'directed',
                ],
                [
                    'name' => 'Completed',
                    'rules' => [
                        'postFunctions' => [
                            [
                                'configuration' => [
                                    'fieldId' => 'assignee',
                                ],
                                'type' => 'ClearFieldValuePostFunction',
                            ],
                        ],
                        'validators' => [
                            [
                                'configuration' => [
                                    'parentStatuses' => [
                                        [
                                            'id' => '3',
                                        ],
                                    ],
                                ],
                                'type' => 'ParentStatusValidator',
                            ],
                            [
                                'configuration' => [
                                    'permissionKey' => 'ADMINISTER_PROJECTS',
                                ],
                                'type' => 'PermissionValidator',
                            ],
                        ],
                    ],
                    'to' => '3',
                    'type' => 'global',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateWorkflowDetails`](/docs/schema/create-workflow-details.md)

The details of a workflow.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the workflow. The name must be unique. The maximum length is 255 characters. Characters can be separated by a whitespace but the name cannot start or end with a whitespace. |
| `statuses` | [`list<CreateWorkflowStatusDetails>`](/docs/schema/create-workflow-status-details.md) | The statuses of the workflow. Any status that does not include a transition is added to the workflow without a transition. |
| `transitions` | [`list<CreateWorkflowTransitionDetails>`](/docs/schema/create-workflow-transition-details.md) | The transitions of the workflow. For the request to be valid, these transitions must:<br/><br/> *  include one *initial* transition.<br/> *  not use the same name for a *global* and *directed* transition.<br/> *  have a unique name for each *global* transition.<br/> *  have a unique 'to' status for each *global* transition.<br/> *  have unique names for each transition from a status.<br/> *  not have a 'from' status on *initial* and *global* transitions.<br/> *  have a 'from' status on *directed* transitions.<br/><br/>All the transition statuses must be included in `statuses`. |
| `description` | `string` | The description of the workflow. The maximum length is 1000 characters. |

#### Response

Source: [`Jira\Client\Schema\WorkflowIDs`](/docs/schema/workflow-i-ds.md)

The classic workflow identifiers.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the workflow. |
| `entityId` | `string` | The entity ID of the workflow. |


## Get Workflows Paginated
<a name="getWorkflowsPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-search-get

Returns a "paginated" list of published classic workflows.
When workflow names are specified, details of those workflows are returned.
Otherwise, all published classic workflows are returned

This operation does not return next-gen workflows

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanWorkflow $response */
$response = $client->getWorkflowsPaginated(
    startAt: 0,
    maxResults: 50,
    workflowName: null,
    expand: null,
    queryString: null,
    orderBy: null,
    isActive: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `workflowName` | `?list<string>` | The name of a workflow to return. To include multiple workflows, provide an ampersand-separated list. For example, `workflowName=name1&workflowName=name2`. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `transitions` For each workflow, returns information about the transitions inside the workflow.<br/> *  `transitions.rules` For each workflow transition, returns information about its rules. Transitions are included automatically if this expand is requested.<br/> *  `transitions.properties` For each workflow transition, returns information about its properties. Transitions are included automatically if this expand is requested.<br/> *  `statuses` For each workflow, returns information about the statuses inside the workflow.<br/> *  `statuses.properties` For each workflow status, returns information about its properties. Statuses are included automatically if this expand is requested.<br/> *  `default` For each workflow, returns information about whether this is the default workflow.<br/> *  `schemes` For each workflow, returns information about the workflow schemes the workflow is assigned to.<br/> *  `projects` For each workflow, returns information about the projects the workflow is assigned to, through workflow schemes.<br/> *  `hasDraftWorkflow` For each workflow, returns information about whether the workflow has a draft version.<br/> *  `operations` For each workflow, returns information about the actions that can be undertaken on the workflow. |
| `queryString` | `?string` | String used to perform a case-insensitive partial match with workflow name. |
| `orderBy` | `'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'created'\|`<br/>`'-created'\|`<br/>`'+created'\|`<br/>`'updated'\|`<br/>`'+updated'\|`<br/>`'-updated'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `name` Sorts by workflow name.<br/> *  `created` Sorts by create time.<br/> *  `updated` Sorts by update time. |
| `isActive` | `?bool` | Filters active and inactive workflows. |

#### Response

Source: [`Jira\Client\Schema\PageBeanWorkflow`](/docs/schema/page-bean-workflow.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Workflow>`](/docs/schema/workflow.md) | The list of items. |


## Delete Inactive Workflow
<a name="deleteInactiveWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-entity-id-delete

Deletes a workflow

The workflow cannot be deleted if it is:

 - an active workflow
 - a system workflow
 - associated with any workflow scheme
 - associated with any draft workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteInactiveWorkflow(
    entityId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `entityId` | `string` | The entity ID of the workflow. |

#### Response

`true`
## Get Issue Types In A Project That Are Using A Given Workflow
<a name="getWorkflowProjectIssueTypeUsages"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-workflow-id-project-project-id-issue-type-usages-get

Returns a page of issue types using a given workflow within a project.

### Example

```php
/** @var Schema\WorkflowProjectIssueTypeUsageDTO $response */
$response = $client->getWorkflowProjectIssueTypeUsages(
    workflowId: 'foo',
    projectId: 1234,
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `string` | The workflow ID |
| `projectId` | `int` | The project ID |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\WorkflowProjectIssueTypeUsageDTO`](/docs/schema/workflow-project-issue-type-usage-dto.md)

Issue types associated with the workflow for a project.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypes` | [`WorkflowProjectIssueTypeUsagePage`](/docs/schema/workflow-project-issue-type-usage-page.md) |  |
| `projectId` | `string` | The ID of the project. |
| `workflowId` | `string` | The ID of the workflow. |


## Get Projects Using A Given Workflow
<a name="getProjectUsagesForWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-workflow-id-project-usages-get

Returns a page of projects using a given workflow.

### Example

```php
/** @var Schema\WorkflowProjectUsageDTO $response */
$response = $client->getProjectUsagesForWorkflow(
    workflowId: 'foo',
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `string` | The workflow ID |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\WorkflowProjectUsageDTO`](/docs/schema/workflow-project-usage-dto.md)

Projects using the workflow.

| Property | Type | Description |
| --- | --- | --- |
| `projects` | [`ProjectUsagePage`](/docs/schema/project-usage-page.md) |  |
| `workflowId` | `string` | The workflow ID. |


## Get Workflow Schemes Which Are Using A Given Workflow
<a name="getWorkflowSchemeUsagesForWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflow-workflow-id-workflow-schemes-get

Returns a page of workflow schemes using a given workflow.

### Example

```php
/** @var Schema\WorkflowSchemeUsageDTO $response */
$response = $client->getWorkflowSchemeUsagesForWorkflow(
    workflowId: 'foo',
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `string` | The workflow ID |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\WorkflowSchemeUsageDTO`](/docs/schema/workflow-scheme-usage-dto.md)

Workflow schemes using the workflow.

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `string` | The workflow ID. |
| `workflowSchemes` | [`WorkflowSchemeUsagePage`](/docs/schema/workflow-scheme-usage-page.md) |  |


## Bulk Get Workflows
<a name="readWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-post

Returns a list of workflows and related statuses by providing workflow names, workflow IDs, or project and issue types

**"Permissions" required:**

 - *Administer Jira* global permission to access all, including project-scoped, workflows
 - At least one of the *Administer projects* and *View (read-only) workflow* project permissions to access project-scoped workflows

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowReadResponse $response */
$response = $client->readWorkflows(
    request: new Schema\WorkflowReadRequest(
        projectAndIssueTypes: [
            ],
        workflowIds: [
            ],
        workflowNames: [
                'Workflow 1',
                'Workflow 2',
            ],
    )
    expand: null,
    useApprovalConfiguration: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowReadRequest`](/docs/schema/workflow-read-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `projectAndIssueTypes` | [`?list<ProjectAndIssueTypePair>`](/docs/schema/project-and-issue-type-pair.md) | The list of projects and issue types to query. |
| `workflowIds` | `?list<string>` | The list of workflow IDs to query. |
| `workflowNames` | `?list<string>` | The list of workflow names to query. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.<br/><br/>Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `workflows.usages` Returns the project and issue types that each workflow is associated with.<br/> *  `statuses.usages` Returns the project and issue types that each status is associated with. |
| `useApprovalConfiguration` | `?bool` | Return the new field `approvalConfiguration` instead of the deprecated status properties for approval configuration. |

#### Response

Source: [`Jira\Client\Schema\WorkflowReadResponse`](/docs/schema/workflow-read-response.md)

Details of workflows and related statuses.

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<JiraWorkflowStatus>`](/docs/schema/jira-workflow-status.md) | List of statuses. |
| `workflows` | [`?list<JiraWorkflow>`](/docs/schema/jira-workflow.md) | List of workflows. |


## Get Available Workflow Capabilities
<a name="workflowCapabilities"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-capabilities-get

Get the list of workflow capabilities for a specific workflow using either the workflow ID, or the project and issue type ID pair.
The response includes the scope of the workflow, defined as global/project-based, and a list of project types that the workflow is scoped to.
It also includes all rules organised into their broad categories (conditions, validators, actions, triggers, screens) as well as the source location (Atlassian-provided, Connect, Forge)

**"Permissions" required:**

 - *Administer Jira* project permission to access all, including global-scoped, workflows
 - *Administer projects* project permissions to access project-scoped workflows

The current list of Atlassian-provided rules:

#### Validators ####

A validator rule that checks if a user has the required permissions to execute the transition in the workflow

##### Permission validator #####

A validator rule that checks if a user has the required permissions to execute the transition in the workflow

    {
       "ruleKey": "system:check-permission-validator",
       "parameters": {
         "permissionKey": "ADMINISTER_PROJECTS"
       }
     }

Parameters:

 - `permissionKey` The permission required to perform the transition.
Allowed values: "built-in Jira permissions"

##### Parent or child blocking validator #####

A validator to block the child issue's transition depending on the parent issue's status

    {
       "ruleKey" : "system:parent-or-child-blocking-validator"
       "parameters" : {
         "blocker" : "PARENT"
         "statusIds" : "1,2,3"
       }
     }

Parameters:

 - `blocker` currently only supports `PARENT`
 - `statusIds` a comma-separated list of status IDs

##### Previous status validator #####

A validator that checks if an issue has transitioned through specified previous status(es) before allowing the current transition to occur

    {
       "ruleKey": "system:previous-status-validator",
       "parameters": {
         "previousStatusIds": "10014",
         "mostRecentStatusOnly": "true"
       }
     }

Parameters:

 - `previousStatusIds` a comma-separated list of status IDs, currently only support one ID
 - `mostRecentStatusOnly` when `true` only considers the most recent status for the condition evaluation.
Allowed values: `true`, `false`

##### Validate a field value #####

A validation that ensures a specific field's value meets the defined criteria before allowing an issue to transition in the workflow

Depending on the rule type, the result will vary:

###### Field required ######

    {
       "ruleKey": "system:validate-field-value",
       "parameters": {
         "ruleType": "fieldRequired",
         "fieldsRequired": "assignee",
         "ignoreContext": "true",
         "errorMessage": "An assignee must be set!"
       }
     }

Parameters:

 - `fieldsRequired` the ID of the field that is required.
For a custom field, it would look like `customfield_123`
 - `ignoreContext` controls the impact of context settings on field validation.
When set to `true`, the validator doesn't check a required field if its context isn't configured for the current issue.
When set to `false`, the validator requires a field even if its context is invalid.
Allowed values: `true`, `false`
 - `errorMessage` is the error message to display if the user does not provide a value during the transition.
A default error message will be shown if you don't provide one (Optional)

###### Field changed ######

    {
       "ruleKey": "system:validate-field-value",
       "parameters": {
         "ruleType": "fieldChanged",
         "groupsExemptFromValidation": "6862ac20-8672-4f68-896d-4854f5efb79e",
         "fieldKey": "versions",
         "errorMessage": "Affect versions must be modified before transition"
       }
     }

Parameters:

 - `groupsExemptFromValidation` a comma-separated list of group IDs to be exempt from the validation
 - `fieldKey` the ID of the field that has changed.
For a custom field, it would look like `customfield_123`
 - `errorMessage` the error message to display if the user does not provide a value during the transition.
A default error message will be shown if you don't provide one (Optional)

###### Field has a single value ######

    {
       "ruleKey": "system:validate-field-value",
       "parameters": {
         "ruleType": "fieldHasSingleValue",
         "fieldKey": "created",
         "excludeSubtasks": "true"
       }
     }

Parameters:

 - `fieldKey` the ID of the field to validate.
For a custom field, it would look like `customfield_123`
 - `excludeSubtasks` Option to exclude values copied from sub-tasks.
Allowed values: `true`, `false`

###### Field matches regular expression ######

    {
       "ruleKey": "system:validate-field-value",
       "parameters": {
         "ruleType": "fieldMatchesRegularExpression",
         "regexp": "[0-9]{4}",
         "fieldKey": "description"
       }
     }

Parameters:

 - `regexp` the regular expression used to validate the field\\u2019s content
 - `fieldKey` the ID of the field to validate.
For a custom field, it would look like `customfield_123`

###### Date field comparison ######

    {
       "ruleKey": "system:validate-field-value",
       "parameters": {
         "ruleType": "dateFieldComparison",
         "date1FieldKey": "duedate",
         "date2FieldKey": "customfield_10054",
         "includeTime": "true",
         "conditionSelected": ">="
       }
     }

Parameters:

 - `date1FieldKey` the ID of the first field to compare.
For a custom field, it would look like `customfield_123`
 - `date2FieldKey` the ID of the second field to compare.
For a custom field, it would look like `customfield_123`
 - `includeTime` if `true`, compares both date and time.
Allowed values: `true`, `false`
 - `conditionSelected` the condition to compare with.
Allowed values: `>`, `>=`, `=`, `<=`, `<`, `!=`

###### Date range comparison ######

    {
       "ruleKey": "system:validate-field-value",
       "parameters": {
         "ruleType": "windowDateComparison",
         "date1FieldKey": "customfield_10009",
         "date2FieldKey": "customfield_10054",
         "numberOfDays": "3"
       }
     }

Parameters:

 - `date1FieldKey` the ID of the first field to compare.
For a custom field, it would look like `customfield_123`
 - `date2FieldKey` the ID of the second field to compare.
For a custom field, it would look like `customfield_123`
 - `numberOfDays` maximum number of days past the reference date (`date2FieldKey`) to pass validation

This rule is composed by aggregating the following legacy rules:

 - FieldRequiredValidator
 - FieldChangedValidator
 - FieldHasSingleValueValidator
 - RegexpFieldValidator
 - DateFieldValidator
 - WindowsDateValidator

##### Pro forma: Forms attached validator #####

Validates that one or more forms are attached to the issue

    {
       "ruleKey" : "system:proforma-forms-attached"
       "parameters" : {}
     }

##### Proforma: Forms submitted validator #####

Validates that all forms attached to the issue have been submitted

    {
       "ruleKey" : "system:proforma-forms-submitted"
       "parameters" : {}
     }

#### Conditions ####

Conditions enable workflow rules that govern whether a transition can execute

##### Check field value #####

A condition rule evaluates as true if a specific field's value meets the defined criteria.
This rule ensures that an issue can only transition to the next step in the workflow if the field's value matches the desired condition

    {
       "ruleKey": "system:check-field-value",
       "parameters": {
         "fieldId": "description",
         "fieldValue": "[\"Done\"]",
         "comparator": "=",
         "comparisonType": "STRING"
       }
     }

Parameters:

 - `fieldId` The ID of the field to check the value of.
For non-system fields, it will look like `customfield_123`.
Note: `fieldId` is used interchangeably with the idea of `fieldKey` here, they refer to the same field
 - `fieldValue` the list of values to check against the field\\u2019s value
 - `comparator` The comparison logic.
Allowed values: `>`, `>=`, `=`, `<=`, `<`, `!=`
 - `comparisonType` The type of data being compared.
Allowed values: `STRING`, `NUMBER`, `DATE`, `DATE_WITHOUT_TIME`, `OPTIONID`

##### Restrict issue transition #####

This rule ensures that issue transitions are restricted based on user accounts, roles, group memberships, and permissions, maintaining control over who can transition an issue.
This condition evaluates as `true` if any of the following criteria is met

    {
       "ruleKey": "system:restrict-issue-transition",
       "parameters": {
         "accountIds": "allow-reporter,5e68ac137d64450d01a77fa0",
         "roleIds": "10002,10004",
         "groupIds": "703ff44a-7dc8-4f4b-9aa6-a65bf3574fa4",
         "permissionKeys": "ADMINISTER_PROJECTS",
         "groupCustomFields": "customfield_10028",
         "allowUserCustomFields": "customfield_10072,customfield_10144,customfield_10007",
         "denyUserCustomFields": "customfield_10107"
       }
     }

Parameters:

 - `accountIds` a comma-separated list of the user account IDs.
It also allows generic values like: `allow-assignee`, `allow-reporter`, and `accountIds` Note: This is only supported in team-managed projects
 - `roleIds` a comma-separated list of role IDs
 - `groupIds` a comma-separated list of group IDs
 - `permissionKeys` a comma-separated list of permission keys.
Allowed values: "built-in Jira permissions"
 - `groupCustomFields` a comma-separated list of group custom field IDs
 - `allowUserCustomFields` a comma-separated list of user custom field IDs to allow for issue transition
 - `denyUserCustomFields` a comma-separated list of user custom field IDs to deny for issue transition

This rule is composed by aggregating the following legacy rules:

 - AllowOnlyAssignee
 - AllowOnlyReporter
 - InAnyProjectRoleCondition
 - InProjectRoleCondition
 - UserInAnyGroupCondition
 - UserInGroupCondition
 - PermissionCondtion
 - InGroupCFCondition
 - UserIsInCustomFieldCondition

##### Previous status condition #####

A condition that evaluates based on an issue's previous status(es) and specific criteria

    {
       "ruleKey" : "system:previous-status-condition"
       "parameters" : {
         "previousStatusIds" : "10004",
         "not": "true",
         "mostRecentStatusOnly" : "true",
         "includeCurrentStatus": "true",
         "ignoreLoopTransitions": "true"
       }
     }

Parameters:

 - `previousStatusIds` a comma-separated list of status IDs, current only support one ID
 - `not` indicates if the condition should be reversed.
When `true` it checks that the issue has not been in the selected statuses.
Allowed values: `true`, `false`
 - `mostRecentStatusOnly` when true only considers the most recent status for the condition evaluation.
Allowed values: `true`, `false`
 - `includeCurrentStatus` includes the current status when evaluating if the issue has been through the selected statuses.
Allowed values: `true`, `false`
 - `ignoreLoopTransitions` ignore loop transitions.
Allowed values: `true`, `false`

##### Parent or child blocking condition #####

A condition to block the parent\\u2019s issue transition depending on the child\\u2019s issue status

    {
       "ruleKey" : "system:parent-or-child-blocking-condition"
       "parameters" : {
         "blocker" : "CHILD",
         "statusIds" : "1,2,3"
       }
     }

Parameters:

 - `blocker` currently only supports `CHILD`
 - `statusIds` a comma-separated list of status IDs

##### Separation of duties #####

A condition preventing the user from performing, if the user has already performed a transition on the issue

    {
       "ruleKey": "system:separation-of-duties",
       "parameters": {
         "fromStatusId": "10161",
         "toStatusId": "10160"
       }
     }

Parameters:

 - `fromStatusId` represents the status ID from which the issue is transitioning.
It ensures that the user performing the current transition has not performed any actions when the issue was in the specified status
 - `toStatusId` represents the status ID to which the issue is transitioning.
It ensures that the user performing the current transition is not the same user who has previously transitioned the issue

##### Restrict transitions #####

A condition preventing all users from transitioning the issue can also optionally include APIs as well

    {
       "ruleKey": "system:restrict-from-all-users",
       "parameters": {
         "restrictMode": "users"
       }
     }

Parameters:

 - `restrictMode` restricts the issue transition including/excluding APIs.
Allowed values: `"users"`, `"usersAndAPI"`

##### Jira Service Management block until approved #####

Block an issue transition until approval.
Note: This is only supported in team-managed projects

    {
       "ruleKey": "system:jsd-approvals-block-until-approved",
       "parameters": {
         "approvalConfigurationJson": "{"statusExternalUuid...}"
       }
     }

Parameters:

 - `approvalConfigurationJson` a stringified JSON holding the Jira Service Management approval configuration

##### Jira Service Management block until rejected #####

Block an issue transition until rejected.
Note: This is only supported in team-managed projects

    {
       "ruleKey": "system:jsd-approvals-block-until-rejected",
       "parameters": {
         "approvalConfigurationJson": "{"statusExternalUuid...}"
       }
     }

Parameters:

 - `approvalConfigurationJson` a stringified JSON holding the Jira Service Management approval configuration

##### Block in progress approval #####

Condition to block issue transition if there is pending approval.
Note: This is only supported in company-managed projects

    {
       "ruleKey": "system:block-in-progress-approval",
       "parameters": {}
     }

#### Post functions ####

Post functions carry out any additional processing required after a workflow transition is executed

##### Change assignee #####

A post function rule that changes the assignee of an issue after a transition

    {
       "ruleKey": "system:change-assignee",
       "parameters": {
         "type": "to-selected-user",
         "accountId": "example-account-id"
       }
     }

Parameters:

 - `type` the parameter used to determine the new assignee.
Allowed values: `to-selected-user`, `to-unassigned`, `to-current-user`, `to-current-user`, `to-default-user`, `to-default-user`
 - `accountId` the account ID of the user to assign the issue to.
This parameter is required only when the type is `"to-selected-user"`

##### Copy field value #####

A post function that automates the process of copying values between fields during a specific transition, ensuring data consistency and reducing manual effort

    {
       "ruleKey": "system:copy-value-from-other-field",
       "parameters": {
         "sourceFieldKey": "description",
         "targetFieldKey": "components",
         "issueSource": "SAME"
       }
     }

Parameters:

 - `sourceFieldKey` the field key to copy from.
For a custom field, it would look like `customfield_123`
 - `targetFieldKey` the field key to copy to.
For a custom field, it would look like `customfield_123`
 - `issueSource` `SAME` or `PARENT`.
Defaults to `SAME` if no value is provided

##### Update field #####

A post function that updates or appends a specific field with the given value

    {
       "ruleKey": "system:update-field",
       "parameters": {
         "field": "customfield_10056",
         "value": "asdf",
         "mode": "append"
       }
     }

Parameters:

 - `field` the ID of the field to update.
For a custom field, it would look like `customfield_123`
 - `value` the value to update the field with
 - `mode` `append` or `replace`.
Determines if a value will be appended to the current value, or if the current value will be replaced

##### Trigger webhook #####

A post function that automatically triggers a predefined webhook when a transition occurs in the workflow

    {
       "ruleKey": "system:trigger-webhook",
       "parameters": {
         "webhookId": "1"
       }
     }

Parameters:

 - `webhookId` the ID of the webhook

#### Screen ####

##### Remind people to update fields #####

A screen rule that prompts users to update a specific field when they interact with an issue screen during a transition.
This rule is useful for ensuring that users provide or modify necessary information before moving an issue to the next step in the workflow

    {
       "ruleKey": "system:remind-people-to-update-fields",
       "params": {
         "remindingFieldIds": "assignee,customfield_10025",
         "remindingMessage": "The message",
         "remindingAlwaysAsk": "true"
       }
     }

Parameters:

 - `remindingFieldIds` a comma-separated list of field IDs.
Note: `fieldId` is used interchangeably with the idea of `fieldKey` here, they refer to the same field
 - `remindingMessage` the message to display when prompting the users to update the fields
 - `remindingAlwaysAsk` always remind to update fields.
Allowed values: `true`, `false`

##### Shared transition screen #####

A common screen that is shared between transitions in a workflow

    {
       "ruleKey": "system:transition-screen",
       "params": {
         "screenId": "3"
       }
     }

Parameters:

 - `screenId` the ID of the screen

#### Connect & Forge ####

##### Connect rules #####

Validator/Condition/Post function for Connect app

    {
       "ruleKey": "connect:expression-validator",
       "parameters": {
         "appKey": "com.atlassian.app",
         "config": "",
         "id": "90ce590f-e90c-4cd3-8281-165ce41f2ac3",
         "disabled": "false",
         "tag": ""
       }
     }

Parameters:

 - `ruleKey` Validator: `connect:expression-validator`, Condition: `connect:expression-condition`, and Post function: `connect:remote-workflow-function`
 - `appKey` the reference to the Connect app
 - `config` a JSON payload string describing the configuration
 - `id` the ID of the rule
 - `disabled` determine if the Connect app is disabled.
Allowed values: `true`, `false`
 - `tag` additional tags for the Connect app

##### Forge rules #####

Validator/Condition/Post function for Forge app

    {
       "ruleKey": "forge:expression-validator",
       "parameters": {
         "key": "ari:cloud:ecosystem::extension/{appId}/{environmentId}/static/{moduleKey}",
         "config": "{"searchString":"workflow validator"}",
         "id": "a865ddf6-bb3f-4a7b-9540-c2f8b3f9f6c2"
       }
     }

Parameters:

 - `ruleKey` Validator: `forge:expression-validator`, Condition: `forge:expression-condition`, and Post function: `forge:workflow-post-function`
 - `key` the identifier for the Forge app
 - `config` the persistent stringified JSON configuration for the Forge rule
 - `id` the ID of the Forge rule
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions

### Example

```php
/** @var Schema\WorkflowCapabilities $response */
$response = $client->workflowCapabilities(
    workflowId: null,
    projectId: null,
    issueTypeId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `workflowId` | `?string` |  |
| `projectId` | `?string` |  |
| `issueTypeId` | `?string` |  |

#### Response

Source: [`Jira\Client\Schema\WorkflowCapabilities`](/docs/schema/workflow-capabilities.md)

| Property | Type | Description |
| --- | --- | --- |
| `connectRules` | [`?list<AvailableWorkflowConnectRule>`](/docs/schema/available-workflow-connect-rule.md) | The Connect provided ecosystem rules available. |
| `editorScope` | `'PROJECT'\|'GLOBAL'\|null` | The scope of the workflow capabilities. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects. |
| `forgeRules` | [`?list<AvailableWorkflowForgeRule>`](/docs/schema/available-workflow-forge-rule.md) | The Forge provided ecosystem rules available. |
| `projectTypes` | `?list<string>` | The types of projects that this capability set is available for. |
| `systemRules` | [`?list<AvailableWorkflowSystemRule>`](/docs/schema/available-workflow-system-rule.md) | The Atlassian provided system rules available. |
| `triggerRules` | [`?list<AvailableWorkflowTriggers>`](/docs/schema/available-workflow-triggers.md) | The trigger rules available. |


## Bulk Create Workflows
<a name="createWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-create-post

Create workflows and related statuses

**"Permissions" required:**

 - *Administer Jira* project permission to create all, including global-scoped, workflows
 - *Administer projects* project permissions to create project-scoped workflows

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowCreateResponse $response */
$response = $client->createWorkflows(new Schema\WorkflowCreateRequest(
    scope: [
                'type' => 'GLOBAL',
            ],
    statuses: [
                [
                    'description' => '',
                    'name' => 'To Do',
                    'statusCategory' => 'TODO',
                    'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                ],
                [
                    'description' => '',
                    'name' => 'In Progress',
                    'statusCategory' => 'IN_PROGRESS',
                    'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                ],
                [
                    'description' => '',
                    'name' => 'Done',
                    'statusCategory' => 'DONE',
                    'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                ],
            ],
    workflows: [
                [
                    'description' => '',
                    'name' => 'Software workflow 1',
                    'startPointLayout' => [
                        'x' => '-100.00030899048',
                        'y' => '-153.00020599365',
                    ],
                    'statuses' => [
                        [
                            'layout' => [
                                'x' => '114.99993896484',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                        ],
                        [
                            'layout' => [
                                'x' => '317.00009155273',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                        ],
                        [
                            'layout' => [
                                'x' => '508.00024414062',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                        ],
                    ],
                    'transitions' => [
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '1',
                            'links' => [
                            ],
                            'name' => 'Create',
                            'properties' => [
                            ],
                            'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            'triggers' => [
                            ],
                            'type' => 'INITIAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '11',
                            'links' => [
                            ],
                            'name' => 'To Do',
                            'properties' => [
                            ],
                            'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            'triggers' => [
                            ],
                            'type' => 'GLOBAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '21',
                            'links' => [
                            ],
                            'name' => 'In Progress',
                            'properties' => [
                            ],
                            'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            'triggers' => [
                            ],
                            'type' => 'GLOBAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => 'Move a work item from in progress to done',
                            'id' => '31',
                            'links' => [
                                [
                                    'fromPort' => '0',
                                    'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                    'toPort' => '1',
                                ],
                            ],
                            'name' => 'Done',
                            'properties' => [
                            ],
                            'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            'triggers' => [
                            ],
                            'type' => 'DIRECTED',
                            'validators' => [
                            ],
                        ],
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowCreateRequest`](/docs/schema/workflow-create-request.md)

The create workflows payload.

| Property | Type | Description |
| --- | --- | --- |
| `scope` | [`WorkflowScope`](/docs/schema/workflow-scope.md) |  |
| `statuses` | [`?list<WorkflowStatusUpdate>`](/docs/schema/workflow-status-update.md) | The statuses to associate with the workflows. |
| `workflows` | [`?list<WorkflowCreate>`](/docs/schema/workflow-create.md) | The details of the workflows to create. |

#### Response

Source: [`Jira\Client\Schema\WorkflowCreateResponse`](/docs/schema/workflow-create-response.md)

Details of the created workflows and statuses.

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<JiraWorkflowStatus>`](/docs/schema/jira-workflow-status.md) | List of created statuses. |
| `workflows` | [`?list<JiraWorkflow>`](/docs/schema/jira-workflow.md) | List of created workflows. |


## Validate Create Workflows
<a name="validateCreateWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-create-validation-post

Validate the payload for bulk create workflows

**"Permissions" required:**

 - *Administer Jira* project permission to create all, including global-scoped, workflows
 - *Administer projects* project permissions to create project-scoped workflows

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowValidationErrorList $response */
$response = $client->validateCreateWorkflows(new Schema\WorkflowCreateValidateRequest(
    payload: [
                'scope' => [
                    'type' => 'GLOBAL',
                ],
                'statuses' => [
                    0 => [
                        'description' => '',
                        'name' => 'To Do',
                        'statusCategory' => 'TODO',
                        'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                    ],
                    1 => [
                        'description' => '',
                        'name' => 'In Progress',
                        'statusCategory' => 'IN_PROGRESS',
                        'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                    ],
                    2 => [
                        'description' => '',
                        'name' => 'Done',
                        'statusCategory' => 'DONE',
                        'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                    ],
                ],
                'workflows' => [
                    0 => [
                        'description' => '',
                        'name' => 'Software workflow 1',
                        'startPointLayout' => [
                            'x' => '-100.00030899048',
                            'y' => '-153.00020599365',
                        ],
                        'statuses' => [
                            0 => [
                                'layout' => [
                                    'x' => '114.99993896484',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            ],
                            1 => [
                                'layout' => [
                                    'x' => '317.00009155273',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            ],
                            2 => [
                                'layout' => [
                                    'x' => '508.00024414062',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            ],
                        ],
                        'transitions' => [
                            0 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '1',
                                'links' => [
                                ],
                                'name' => 'Create',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'INITIAL',
                                'validators' => [
                                ],
                            ],
                            1 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '11',
                                'links' => [
                                ],
                                'name' => 'To Do',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            2 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '21',
                                'links' => [
                                ],
                                'name' => 'In Progress',
                                'properties' => [
                                ],
                                'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            3 => [
                                'actions' => [
                                ],
                                'description' => 'Move a work item from in progress to done',
                                'id' => '31',
                                'links' => [
                                    0 => [
                                        'fromPort' => '0',
                                        'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                        'toPort' => '1',
                                    ],
                                ],
                                'name' => 'Done',
                                'properties' => [
                                ],
                                'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                                'triggers' => [
                                ],
                                'type' => 'DIRECTED',
                                'validators' => [
                                ],
                            ],
                        ],
                    ],
                ],
            ],
    validationOptions: [
                'levels' => [
                    0 => 'ERROR',
                    1 => 'WARNING',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowCreateValidateRequest`](/docs/schema/workflow-create-validate-request.md)

| Property | Type | Description |
| --- | --- | --- |
| `payload` | [`WorkflowCreateRequest`](/docs/schema/workflow-create-request.md) |  |
| `validationOptions` | [`ValidationOptionsForCreate`](/docs/schema/validation-options-for-create.md) |  |

#### Response

Source: [`Jira\Client\Schema\WorkflowValidationErrorList`](/docs/schema/workflow-validation-error-list.md)

| Property | Type | Description |
| --- | --- | --- |
| `errors` | [`?list<WorkflowValidationError>`](/docs/schema/workflow-validation-error.md) | The list of validation errors. |


## Search Workflows
<a name="searchWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-search-get

Returns a "paginated" list of global and project workflows.
If workflow names are specified in query string, details of those workflows are returned.
Otherwise, all workflows are returned

**"Permissions" required:**

 - *Administer Jira* global permission to access all, including project-scoped, workflows
 - At least one of the *Administer projects* and *View (read-only) workflow* project permissions to access project-scoped workflows

### Example

```php
/** @var Schema\WorkflowSearchResponse $response */
$response = $client->searchWorkflows(
    startAt: null,
    maxResults: null,
    expand: null,
    queryString: null,
    orderBy: null,
    scope: null,
    isActive: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `values.transitions` Returns the transitions that each workflow is associated with. |
| `queryString` | `?string` | String used to perform a case-insensitive partial match with workflow name. |
| `orderBy` | `?string` | [Order](#ordering) the results by a field:<br/><br/> *  `name` Sorts by workflow name.<br/> *  `created` Sorts by create time.<br/> *  `updated` Sorts by update time. |
| `scope` | `?string` | The scope of the workflow. Global for company-managed projects and Project for team-managed projects. |
| `isActive` | `?bool` | Filters active and inactive workflows. |

#### Response

Source: [`Jira\Client\Schema\WorkflowSearchResponse`](/docs/schema/workflow-search-response.md)

Page of items, including workflows and related statuses.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `statuses` | [`?list<JiraWorkflowStatus>`](/docs/schema/jira-workflow-status.md) | List of statuses. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<JiraWorkflow>`](/docs/schema/jira-workflow.md) | List of workflows. |


## Bulk Update Workflows
<a name="updateWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-update-post

Update workflows and related statuses

**"Permissions" required:**

 - *Administer Jira* project permission to create all, including global-scoped, workflows
 - *Administer projects* project permissions to create project-scoped workflows

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowUpdateResponse $response */
$response = $client->updateWorkflows(
    request: new Schema\WorkflowUpdateRequest(
        statuses: [
                [
                    'description' => '',
                    'name' => 'To Do',
                    'statusCategory' => 'TODO',
                    'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                ],
                [
                    'description' => '',
                    'name' => 'In Progress',
                    'statusCategory' => 'IN_PROGRESS',
                    'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                ],
                [
                    'description' => '',
                    'name' => 'Done',
                    'statusCategory' => 'DONE',
                    'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                ],
            ],
        workflows: [
                [
                    'defaultStatusMappings' => [
                        [
                            'newStatusReference' => '10011',
                            'oldStatusReference' => '10010',
                        ],
                    ],
                    'description' => '',
                    'id' => '10001',
                    'startPointLayout' => [
                        'x' => '-100.00030899048',
                        'y' => '-153.00020599365',
                    ],
                    'statusMappings' => [
                        [
                            'issueTypeId' => '10002',
                            'projectId' => '10003',
                            'statusMigrations' => [
                                [
                                    'newStatusReference' => '10011',
                                    'oldStatusReference' => '10010',
                                ],
                            ],
                        ],
                    ],
                    'statuses' => [
                        [
                            'layout' => [
                                'x' => '114.99993896484',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                        ],
                        [
                            'layout' => [
                                'x' => '317.00009155273',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                        ],
                        [
                            'layout' => [
                                'x' => '508.00024414062',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                        ],
                    ],
                    'transitions' => [
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '1',
                            'links' => [
                            ],
                            'name' => 'Create',
                            'properties' => [
                            ],
                            'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            'triggers' => [
                            ],
                            'type' => 'INITIAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '11',
                            'links' => [
                            ],
                            'name' => 'To Do',
                            'properties' => [
                            ],
                            'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            'triggers' => [
                            ],
                            'type' => 'GLOBAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '21',
                            'links' => [
                            ],
                            'name' => 'In Progress',
                            'properties' => [
                            ],
                            'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            'triggers' => [
                            ],
                            'type' => 'GLOBAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => 'Move a work item from in progress to done',
                            'id' => '31',
                            'links' => [
                                [
                                    'fromPort' => '0',
                                    'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                    'toPort' => '1',
                                ],
                            ],
                            'name' => 'Done',
                            'properties' => [
                            ],
                            'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            'triggers' => [
                            ],
                            'type' => 'DIRECTED',
                            'validators' => [
                            ],
                        ],
                    ],
                    'version' => [
                        'id' => '6f6c988b-2590-4358-90c2-5f7960265592',
                        'versionNumber' => '1',
                    ],
                ],
            ],
    )
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowUpdateRequest`](/docs/schema/workflow-update-request.md)

The update workflows payload.

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<WorkflowStatusUpdate>`](/docs/schema/workflow-status-update.md) | The statuses to associate with the workflows. |
| `workflows` | [`?list<WorkflowUpdate>`](/docs/schema/workflow-update.md) | The details of the workflows to update. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `workflows.usages` Returns the project and issue types that each workflow is associated with.<br/> *  `statuses.usages` Returns the project and issue types that each status is associated with. |

#### Response

Source: [`Jira\Client\Schema\WorkflowUpdateResponse`](/docs/schema/workflow-update-response.md)

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<JiraWorkflowStatus>`](/docs/schema/jira-workflow-status.md) | List of updated statuses. |
| `taskId` | `string` | If there is a [asynchronous task](#async-operations) operation, as a result of this update. |
| `workflows` | [`?list<JiraWorkflow>`](/docs/schema/jira-workflow.md) | List of updated workflows. |


## Validate Update Workflows
<a name="validateUpdateWorkflows"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflows/#api-rest-api-3-workflows-update-validation-post

Validate the payload for bulk update workflows

**"Permissions" required:**

 - *Administer Jira* project permission to create all, including global-scoped, workflows
 - *Administer projects* project permissions to create project-scoped workflows

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowValidationErrorList $response */
$response = $client->validateUpdateWorkflows(new Schema\WorkflowUpdateValidateRequestBean(
    payload: [
                'statuses' => [
                    0 => [
                        'description' => '',
                        'name' => 'To Do',
                        'statusCategory' => 'TODO',
                        'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                    ],
                    1 => [
                        'description' => '',
                        'name' => 'In Progress',
                        'statusCategory' => 'IN_PROGRESS',
                        'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                    ],
                    2 => [
                        'description' => '',
                        'name' => 'Done',
                        'statusCategory' => 'DONE',
                        'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                    ],
                ],
                'workflows' => [
                    0 => [
                        'defaultStatusMappings' => [
                            0 => [
                                'newStatusReference' => '10011',
                                'oldStatusReference' => '10010',
                            ],
                        ],
                        'description' => '',
                        'id' => '10001',
                        'startPointLayout' => [
                            'x' => '-100.00030899048',
                            'y' => '-153.00020599365',
                        ],
                        'statusMappings' => [
                            0 => [
                                'issueTypeId' => '10002',
                                'projectId' => '10003',
                                'statusMigrations' => [
                                    0 => [
                                        'newStatusReference' => '10011',
                                        'oldStatusReference' => '10010',
                                    ],
                                ],
                            ],
                        ],
                        'statuses' => [
                            0 => [
                                'layout' => [
                                    'x' => '114.99993896484',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            ],
                            1 => [
                                'layout' => [
                                    'x' => '317.00009155273',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            ],
                            2 => [
                                'layout' => [
                                    'x' => '508.00024414062',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            ],
                        ],
                        'transitions' => [
                            0 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '1',
                                'links' => [
                                ],
                                'name' => 'Create',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'INITIAL',
                                'validators' => [
                                ],
                            ],
                            1 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '11',
                                'links' => [
                                ],
                                'name' => 'To Do',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            2 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '21',
                                'links' => [
                                ],
                                'name' => 'In Progress',
                                'properties' => [
                                ],
                                'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            3 => [
                                'actions' => [
                                ],
                                'description' => 'Move a work item from in progress to done',
                                'id' => '31',
                                'links' => [
                                    0 => [
                                        'fromPort' => '0',
                                        'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                        'toPort' => '1',
                                    ],
                                ],
                                'name' => 'Done',
                                'properties' => [
                                ],
                                'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                                'triggers' => [
                                ],
                                'type' => 'DIRECTED',
                                'validators' => [
                                ],
                            ],
                        ],
                        'version' => [
                            'id' => '6f6c988b-2590-4358-90c2-5f7960265592',
                            'versionNumber' => '1',
                        ],
                    ],
                ],
            ],
    validationOptions: [
                'levels' => [
                    0 => 'ERROR',
                    1 => 'WARNING',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowUpdateValidateRequestBean`](/docs/schema/workflow-update-validate-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `payload` | [`WorkflowUpdateRequest`](/docs/schema/workflow-update-request.md) |  |
| `validationOptions` | [`ValidationOptionsForUpdate`](/docs/schema/validation-options-for-update.md) |  |

#### Response

Source: [`Jira\Client\Schema\WorkflowValidationErrorList`](/docs/schema/workflow-validation-error-list.md)

| Property | Type | Description |
| --- | --- | --- |
| `errors` | [`?list<WorkflowValidationError>`](/docs/schema/workflow-validation-error.md) | The list of validation errors. |
