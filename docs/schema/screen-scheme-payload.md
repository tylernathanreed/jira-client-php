# Screen Scheme Payload

Defines the payload for the screen schemes.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/\#api-rest-api-3-screenscheme-post

Source: [`Jira\Client\Schema\ScreenSchemePayload`](/src/Schema/ScreenSchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultScreen` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `description` | `string` | The description of the screen scheme |
| `name` | `string` | The name of the screen scheme |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `screens` | [`array<string,ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | Similar to the field layout scheme those mappings allow users to set different screens for different operations: default - always there, applied to all operations that don't have an explicit mapping `create`, `view`, `edit` - specific operations that are available and users can assign a different screen for each one of them https://support.atlassian.com/jira-cloud-administration/docs/manage-screen-schemes/\#Associating-a-screen-with-an-issue-operation |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
