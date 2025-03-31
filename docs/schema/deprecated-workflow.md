# Deprecated Workflow

Details about a workflow.

Source: [`Jira\Client\Schema\DeprecatedWorkflow`](src/Schema/DeprecatedWorkflow.php)

| Property | Type | Description |
| --- | --- | --- |
| `default` | `bool` |  |
| `description` | `string` | The description of the workflow. |
| `lastModifiedDate` | `string` | The datetime the workflow was last modified. |
| `lastModifiedUser` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `lastModifiedUserAccountId` | `string` | The account ID of the user that last modified the workflow. |
| `name` | `string` | The name of the workflow. |
| `scope` | `Scope` | The scope where this workflow applies |
| `steps` | `int` | The number of steps included in the workflow. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [getAllWorkflows](/docs/operations/workflows.md#get-all-workflows) |

### Schema

*None*
