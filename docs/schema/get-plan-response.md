# Get Plan Response


Source: [`Jira\Client\Schema\GetPlanResponse`](/src/Schema/GetPlanResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The plan ID. |
| `scheduling` | [`GetSchedulingResponse`](/docs/schema/get-scheduling-response.md) | The scheduling settings for the plan. |
| `status` | `'Active'\|'Trashed'\|'Archived'` | The plan status. This is "Active", "Trashed" or "Archived". |
| `crossProjectReleases` | [`?list<GetCrossProjectReleaseResponse>`](/docs/schema/get-cross-project-release-response.md) | The cross-project releases included in the plan. |
| `customFields` | [`?list<GetCustomFieldResponse>`](/docs/schema/get-custom-field-response.md) | The custom fields for the plan. |
| `exclusionRules` | [`GetExclusionRulesResponse`](/docs/schema/get-exclusion-rules-response.md) | The exclusion rules for the plan. |
| `issueSources` | [`?list<GetIssueSourceResponse>`](/docs/schema/get-issue-source-response.md) | The issue sources included in the plan. |
| `lastSaved` | `string` | The date when the plan was last saved in UTC. |
| `leadAccountId` | `string` | The account ID of the plan lead. |
| `name` | `string` | The plan name. |
| `permissions` | [`?list<GetPermissionResponse>`](/docs/schema/get-permission-response.md) | The permissions for the plan. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Plans](/docs/operations/plans.md) | [getPlan](/docs/operations/plans.md#get-plan) |

### Schema

*None*
