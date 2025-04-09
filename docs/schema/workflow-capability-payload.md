# Workflow Capability Payload

The payload for creating a workflows.
See https://www.atlassian.com/software/jira/guides/workflows/overview\#what-is-a-jira-workflow

Source: [`Jira\Client\Schema\WorkflowCapabilityPayload`](/src/Schema/WorkflowCapabilityPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `statuses` | [`?list<StatusPayload>`](/docs/schema/status-payload.md) | The statuses for the workflow |
| `workflowScheme` | [`WorkflowSchemePayload`](/docs/schema/workflow-scheme-payload.md) |  |
| `workflows` | [`?list<WorkflowPayload>`](/docs/schema/workflow-payload.md) | The transitions for the workflow |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
