# Get Plan Response


Source: [`Jira\Client\Schema\GetPlanResponse`](/src/Schema/GetPlanResponse.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `` | The plan ID. |
| `scheduling` | `` | The scheduling settings for the plan. |
| `status` | `'Active'|'Trashed'|'Archived'` | The plan status. This is "Active", "Trashed" or "Archived". |
| `crossProjectReleases` | `?list<GetCrossProjectReleaseResponse>` | The cross-project releases included in the plan. |
| `customFields` | `?list<GetCustomFieldResponse>` | The custom fields for the plan. |
| `exclusionRules` | `` | The exclusion rules for the plan. |
| `issueSources` | `?list<GetIssueSourceResponse>` | The issue sources included in the plan. |
| `lastSaved` | `` | The date when the plan was last saved in UTC. |
| `leadAccountId` | `` | The account ID of the plan lead. |
| `name` | `` | The plan name. |
| `permissions` | `?list<GetPermissionResponse>` | The permissions for the plan. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Plans](/docs/operations/plans.md) | [getPlan](/docs/operations/plans.md#get-plan) |

### Schema

*None*
