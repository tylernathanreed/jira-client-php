# Workflow Scheme Read Response


Source: [`Jira\Client\Schema\WorkflowSchemeReadResponse`](/src/Schema/WorkflowSchemeReadResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the workflow scheme. |
| `name` | `string` | The name of the workflow scheme. |
| `scope` | [`WorkflowScope`](/docs/schema/workflow-scope.md) |  |
| `version` | [`DocumentVersion`](/docs/schema/document-version.md) |  |
| `workflowsForIssueTypes` | [`list<WorkflowMetadataAndIssueTypeRestModel>`](/docs/schema/workflow-metadata-and-issue-type-rest-model.md) | Mappings from workflows to issue types. |
| `defaultWorkflow` | [`WorkflowMetadataRestModel`](/docs/schema/workflow-metadata-rest-model.md) |  |
| `description` | `string` | The description of the workflow scheme. |
| `projectIdsUsingScheme` | `?list<string>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

The IDs of projects using the workflow scheme. |
| `taskId` | `string` | Indicates if there's an [asynchronous task](#async-operations) for this workflow scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [WorkflowSchemes](/docs/operations/workflow-schemes.md) | [readWorkflowSchemes](/docs/operations/workflow-schemes.md#read-workflow-schemes) |

### Schema

*None*
