# Create Plan Request


Source: [`Jira\Client\Schema\CreatePlanRequest`](/src/Schema/CreatePlanRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueSources` | `list<CreateIssueSourceRequest>` | The issue sources to include in the plan. |
| `name` | `` | The plan name. |
| `scheduling` | `` | The scheduling settings for the plan. |
| `crossProjectReleases` | `?list<CreateCrossProjectReleaseRequest>` | The cross-project releases to include in the plan. |
| `customFields` | `?list<CreateCustomFieldRequest>` | The custom fields for the plan. |
| `exclusionRules` | `` | The exclusion rules for the plan. |
| `leadAccountId` | `` | The account ID of the plan lead. |
| `permissions` | `?list<CreatePermissionRequest>` | The permissions for the plan. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Plans](/docs/operations/plans.md) | [createPlan](/docs/operations/plans.md#create-plan) |

### Schema

*None*
