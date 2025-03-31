# Issue Transition

Details of an issue transition.

Source: [`Jira\Client\Schema\IssueTransition`](/src/Schema/IssueTransition.php)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `` | Expand options that include additional transition details in the response. |
| `fields` | `array<string,FieldMetadata>` | Details of the fields associated with the issue transition screen. Use this information to populate `fields` and `update` in a transition request. |
| `hasScreen` | `` | Whether there is a screen associated with the issue transition. |
| `id` | `` | The ID of the issue transition. Required when specifying a transition to undertake. |
| `isAvailable` | `` | Whether the transition is available to be performed. |
| `isConditional` | `` | Whether the issue has to meet criteria before the issue transition is applied. |
| `isGlobal` | `` | Whether the issue transition is global, that is, the transition is applied to issues regardless of their status. |
| `isInitial` | `` | Whether this is the initial issue transition for the workflow. |
| `looped` | `` |  |
| `name` | `` | The name of the issue transition. |
| `to` | `` | Details of the issue status after the transition. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueBean](/docs/schema/issue-bean.md) |
| [IssueUpdateDetails](/docs/schema/issue-update-details.md) |
| [Transitions](/docs/schema/transitions.md) |
