# Screen Payload

Defines the payload for the field screens.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/\#api-rest-api-3-screens-post

Source: [`Jira\Client\Schema\ScreenPayload`](/src/Schema/ScreenPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the screen |
| `name` | `string` | The name of the screen |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `tabs` | [`?list<TabPayload>`](/docs/schema/tab-payload.md) | The tabs of the screen. See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/\#api-rest-api-3-screens-screenid-tabs-tabid-fields-post |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
