# Workflow Capabilities


Source: [`Jira\Client\Schema\WorkflowCapabilities`](/src/Schema/WorkflowCapabilities.php)

| Property | Type | Description |
| --- | --- | --- |
| `connectRules` | `?list<AvailableWorkflowConnectRule>` | The Connect provided ecosystem rules available. |
| `editorScope` | `'PROJECT'\|'GLOBAL'\|null` | The scope of the workflow capabilities. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects. |
| `forgeRules` | `?list<AvailableWorkflowForgeRule>` | The Forge provided ecosystem rules available. |
| `projectTypes` | `?list<string>` | The types of projects that this capability set is available for. |
| `systemRules` | `?list<AvailableWorkflowSystemRule>` | The Atlassian provided system rules available. |
| `triggerRules` | `?list<AvailableWorkflowTriggers>` | The trigger rules available. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [workflowCapabilities](/docs/operations/workflows.md#workflow-capabilities) |

### Schema

*None*
