# Workflow Metadata Rest Model

Workflow metadata and usage detail.

Source: [`Jira\Client\Schema\WorkflowMetadataRestModel`](/src/Schema/WorkflowMetadataRestModel.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `` | The description of the workflow. |
| `id` | `` | The ID of the workflow. |
| `name` | `` | The name of the workflow. |
| `usage` | `list<SimpleUsage>` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.

Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the workflows in the workflow scheme. |
| `version` | `` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [WorkflowMetadataAndIssueTypeRestModel](/docs/schema/workflow-metadata-and-issue-type-rest-model.md) |
| [WorkflowSchemeReadResponse](/docs/schema/workflow-scheme-read-response.md) |
