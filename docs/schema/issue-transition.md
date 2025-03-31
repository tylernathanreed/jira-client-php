# Issue Transition

Details of an issue transition.

Source: [`Jira\Client\Schema\IssueTransition`](/src/Schema/IssueTransition.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional transition details in the response. |
| `fields` | `array<string,FieldMetadata>` | Details of the fields associated with the issue transition screen. Use this information to populate `fields` and `update` in a transition request. |
| `hasScreen` | `bool` | Whether there is a screen associated with the issue transition. |
| `id` | `string` | The ID of the issue transition. Required when specifying a transition to undertake. |
| `isAvailable` | `bool` | Whether the transition is available to be performed. |
| `isConditional` | `bool` | Whether the issue has to meet criteria before the issue transition is applied. |
| `isGlobal` | `bool` | Whether the issue transition is global, that is, the transition is applied to issues regardless of their status. |
| `isInitial` | `bool` | Whether this is the initial issue transition for the workflow. |
| `looped` | `bool` |  |
| `name` | `string` | The name of the issue transition. |
| `to` | [`StatusDetails`](/docs/schema/status-details.md) | Details of the issue status after the transition. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueBean](/docs/schema/issue-bean.md) |
| [IssueUpdateDetails](/docs/schema/issue-update-details.md) |
| [Transitions](/docs/schema/transitions.md) |
