# Workflow Rules Search

Details of the workflow and its transition rules.

Source: [`Jira\Client\Schema\WorkflowRulesSearch`](src/Schema/WorkflowRulesSearch.php)

| Property | Type | Description |
| --- | --- | --- |
| `ruleIds` | `array` | The list of workflow rule IDs. |
| `workflowEntityId` | `string` | The workflow ID. |
| `expand` | `string` | Use expand to include additional information in the response. This parameter accepts `transition` which, for each rule, returns information about the transition the rule is assigned to. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AppMigration](/docs/operations/app-migration.md) | [MigrationResource.workflowRuleSearch_post](/docs/operations/app-migration.md#migration-resource.workflow-rule-search_post) |

### Schema

*None*
