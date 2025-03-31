# Issue Entity Properties For Multi Update

An issue ID with entity property values.
See "Entity properties" for more information.
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

Source: [`Jira\Client\Schema\IssueEntityPropertiesForMultiUpdate`](/src/Schema/IssueEntityPropertiesForMultiUpdate.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueID` | `int` | The ID of the issue. |
| `properties` | [`array<string,JsonNode>`](/docs/schema/json-node.md) | Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [MultiIssueEntityProperties](/docs/schema/multi-issue-entity-properties.md) |
