# Issue Layout Payload

Defines the payload to configure the issue layouts for a project.

Source: [`Jira\Client\Schema\IssueLayoutPayload`](/src/Schema/IssueLayoutPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `containerId` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `issueLayoutType` | `'ISSUE_VIEW'\|`<br/>`'ISSUE_CREATE'\|`<br/>`'REQUEST_FORM'\|`<br/>`null` | The issue layout type |
| `items` | [`?list<IssueLayouItemtPayload>`](/docs/schema/issue-layou-itemt-payload.md) | The configuration of items in the issue layout |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
