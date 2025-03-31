# Create Plan Request


Source: [`Jira\Client\Schema\CreatePlanRequest`](/src/Schema/CreatePlanRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueSources` | [`list<CreateIssueSourceRequest>`](/src/Schema/CreateIssueSourceRequest.php) | The issue sources to include in the plan. |
| `name` | `string` | The plan name. |
| `scheduling` | `CreateSchedulingRequest` | The scheduling settings for the plan. |
| `crossProjectReleases` | [`?list<CreateCrossProjectReleaseRequest>`](/src/Schema/CreateCrossProjectReleaseRequest.php) | The cross-project releases to include in the plan. |
| `customFields` | [`?list<CreateCustomFieldRequest>`](/src/Schema/CreateCustomFieldRequest.php) | The custom fields for the plan. |
| `exclusionRules` | `CreateExclusionRulesRequest` | The exclusion rules for the plan. |
| `leadAccountId` | `string` | The account ID of the plan lead. |
| `permissions` | [`?list<CreatePermissionRequest>`](/src/Schema/CreatePermissionRequest.php) | The permissions for the plan. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Plans](/docs/operations/plans.md) | [createPlan](/docs/operations/plans.md#create-plan) |

### Schema

*None*
