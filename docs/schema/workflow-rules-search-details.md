# Workflow Rules Search Details

Details of workflow transition rules.

Source: [`Jira\Client\Schema\WorkflowRulesSearchDetails`](/src/Schema/WorkflowRulesSearchDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `invalidRules` | `?list<string>` | List of workflow rule IDs that do not belong to the workflow or can not be found. |
| `validRules` | [`?list<WorkflowTransitionRules>`](/src/Schema/WorkflowTransitionRules.php) | List of valid workflow transition rules. |
| `workflowEntityId` | `string` | The workflow ID. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AppMigration](/docs/operations/app-migration.md) | [MigrationResource.workflowRuleSearch_post](/docs/operations/app-migration.md#migration-resource.workflow-rule-search_post) |

### Schema

*None*
