# Workflow Scheme Payload

The payload for creating a workflow scheme.
See https://www.atlassian.com/software/jira/guides/workflows/overview\#what-is-a-jira-workflow-scheme

Source: [`Jira\Client\Schema\WorkflowSchemePayload`](/src/Schema/WorkflowSchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `description` | `string` | The description of the workflow scheme |
| `explicitMappings` | [`array<string,ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | Association between issuetypes and workflows |
| `name` | `string` | The name of the workflow scheme |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [WorkflowCapabilityPayload](/docs/schema/workflow-capability-payload.md) |
