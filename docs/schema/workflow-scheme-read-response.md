# Workflow Scheme Read Response


Source: [`Jira\Client\Schema\WorkflowSchemeReadResponse`](/src/Schema/WorkflowSchemeReadResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `` | The ID of the workflow scheme. |
| `name` | `` | The name of the workflow scheme. |
| `scope` | `` |  |
| `version` | `` |  |
| `workflowsForIssueTypes` | `list<WorkflowMetadataAndIssueTypeRestModel>` | Mappings from workflows to issue types. |
| `defaultWorkflow` | `` |  |
| `description` | `` | The description of the workflow scheme. |
| `projectIdsUsingScheme` | `?list<string>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

The IDs of projects using the workflow scheme. |
| `taskId` | `` | Indicates if there's an [asynchronous task](#async-operations) for this workflow scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [readWorkflowSchemes](/docs/operations/workflow-schemes.md#read-workflow-schemes) |

### Schema

*None*
