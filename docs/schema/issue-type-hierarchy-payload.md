# Issue Type Hierarchy Payload

The payload for creating an issue type hierarchy

Source: [`Jira\Client\Schema\IssueTypeHierarchyPayload`](/src/Schema/IssueTypeHierarchyPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `hierarchyLevel` | `int` | The hierarchy level of the issue type. 0, 1, 2, 3 .. n; Negative values for subtasks |
| `name` | `string` | The name of the issue type |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The conflict strategy to use when the issue type already exists. FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [IssueTypeProjectCreatePayload](/docs/schema/issue-type-project-create-payload.md) |
