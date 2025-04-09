# Tab Payload

Defines the payload for the tabs of the screen.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/\#api-rest-api-3-screens-screenid-tabs-tabid-fields-post

Source: [`Jira\Client\Schema\TabPayload`](/src/Schema/TabPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `fields` | [`?list<ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | The list of resource identifier of the field associated to the tab. See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/\#api-rest-api-3-screens-screenid-tabs-tabid-fields-post |
| `name` | `string` | The name of the tab |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [ScreenPayload](/docs/schema/screen-payload.md) |
