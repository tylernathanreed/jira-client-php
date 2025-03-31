# Create Workflow Transition Rules Details

The details of a workflow transition rules.

Source: [`Jira\Client\Schema\CreateWorkflowTransitionRulesDetails`](/src/Schema/CreateWorkflowTransitionRulesDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `conditions` | `CreateWorkflowCondition` | The workflow conditions. |
| `postFunctions` | [`?list<CreateWorkflowTransitionRule>`](/docs/schema/create-workflow-transition-rule.md) | The workflow post functions.

**Note:** The default post functions are always added to the *initial* transition, as in:

    "postFunctions": [
        {
            "type": "IssueCreateFunction"
        },
        {
            "type": "IssueReindexFunction"
        },
        {
            "type": "FireIssueEventFunction",
            "configuration": {
                "event": {
                    "id": "1",
                    "name": "issue_created"
                }
            }
        }
    ]

**Note:** The default post functions are always added to the *global* and *directed* transitions, as in:

    "postFunctions": [
        {
            "type": "UpdateIssueStatusFunction"
        },
        {
            "type": "CreateCommentFunction"
        },
        {
            "type": "GenerateChangeHistoryFunction"
        },
        {
            "type": "IssueReindexFunction"
        },
        {
            "type": "FireIssueEventFunction",
            "configuration": {
                "event": {
                    "id": "13",
                    "name": "issue_generic"
                }
            }
        }
    ] |
| `validators` | [`?list<CreateWorkflowTransitionRule>`](/docs/schema/create-workflow-transition-rule.md) | The workflow validators.

**Note:** The default permission validator is always added to the *initial* transition, as in:

    "validators": [
        {
            "type": "PermissionValidator",
            "configuration": {
                "permissionKey": "CREATE_ISSUES"
            }
        }
    ] |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [CreateWorkflowTransitionDetails](/docs/schema/create-workflow-transition-details.md) |
