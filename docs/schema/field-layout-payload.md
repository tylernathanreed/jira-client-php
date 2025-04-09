# Field Layout Payload

Defines the payload for the field layouts.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-group-issue-field-configurations" + fieldlayout is what users would see as "Field Configuration" in Jira's UI - https://support.atlassian.com/jira-cloud-administration/docs/manage-issue-field-configurations/

Source: [`Jira\Client\Schema\FieldLayoutPayload`](/src/Schema/FieldLayoutPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `configuration` | [`?list<FieldLayoutConfiguration>`](/docs/schema/field-layout-configuration.md) | The field layout configuration. See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-rest-api-3-fieldconfiguration-post |
| `description` | `string` | The description of the field layout |
| `name` | `string` | The name of the field layout |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
