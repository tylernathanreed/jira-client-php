# Get Plan Response


Source: [`Jira\Client\Schema\GetPlanResponse`](/src/Schema/GetPlanResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The plan ID. |
| `scheduling` | `GetSchedulingResponse` | The scheduling settings for the plan. |
| `status` | `'Active'\|'Trashed'\|'Archived'` | The plan status. This is "Active", "Trashed" or "Archived". |
| `crossProjectReleases` | [`?list<GetCrossProjectReleaseResponse>`](/docs/schemas/get-cross-project-release-response.md) | The cross-project releases included in the plan. |
| `customFields` | [`?list<GetCustomFieldResponse>`](/docs/schemas/get-custom-field-response.md) | The custom fields for the plan. |
| `exclusionRules` | `GetExclusionRulesResponse` | The exclusion rules for the plan. |
| `issueSources` | [`?list<GetIssueSourceResponse>`](/docs/schemas/get-issue-source-response.md) | The issue sources included in the plan. |
| `lastSaved` | `string` | The date when the plan was last saved in UTC. |
| `leadAccountId` | `string` | The account ID of the plan lead. |
| `name` | `string` | The plan name. |
| `permissions` | [`?list<GetPermissionResponse>`](/docs/schemas/get-permission-response.md) | The permissions for the plan. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Plans](/docs/operations/plans.md) | [getPlan](/docs/operations/plans.md#get-plan) |

### Schema

*None*
