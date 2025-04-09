# Issue Type Payload

The payload for creating an issue type

Source: [`Jira\Client\Schema\IssueTypePayload`](/src/Schema/IssueTypePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `avatarId` | `int` | The avatar ID of the issue type. Go to https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-avatars/\#api-rest-api-3-avatar-type-system-get to choose an avatarId existing in Jira |
| `description` | `string` | The description of the issue type |
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
