# Workflow Capabilities


Source: [`Jira\Client\Schema\WorkflowCapabilities`](src/Schema/WorkflowCapabilities.php)

| Property | Type | Description |
| --- | --- | --- |
| `connectRules` | `array` | The Connect provided ecosystem rules available. |
| `editorScope` | `string` | The scope of the workflow capabilities. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects. |
| `forgeRules` | `array` | The Forge provided ecosystem rules available. |
| `projectTypes` | `array` | The types of projects that this capability set is available for. |
| `systemRules` | `array` | The Atlassian provided system rules available. |
| `triggerRules` | `array` | The trigger rules available. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Workflows](/docs/operations/workflows.md) | [workflowCapabilities](/docs/operations/workflows.md#workflow-capabilities) |

### Schema

*None*
