# Swimlanes Payload

The payload for customising a swimlanes on a board

Source: [`Jira\Client\Schema\SwimlanesPayload`](/src/Schema/SwimlanesPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `customSwimlanes` | [`?list<SwimlanePayload>`](/docs/schema/swimlane-payload.md) | The custom swimlane definitions. |
| `defaultCustomSwimlaneName` | `string` | The name of the custom swimlane to use for work items that don't match any other swimlanes. |
| `swimlaneStrategy` | `'none'\|`<br/>`'custom'\|`<br/>`'parentChild'\|`<br/>`'assignee'\|`<br/>`'assigneeUnassignedFirst'\|`<br/>`'epic'\|`<br/>`'project'\|`<br/>`'issueparent'\|`<br/>`'issuechildren'\|`<br/>`'request_type'\|`<br/>`null` | The swimlane strategy for the board. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [BoardPayload](/docs/schema/board-payload.md) |
