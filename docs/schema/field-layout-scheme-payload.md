# Field Layout Scheme Payload

Defines the payload for the field layout schemes.
See "Field Configuration Scheme" - https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-rest-api-3-fieldconfigurationscheme-post https://support.atlassian.com/jira-cloud-administration/docs/configure-a-field-configuration-scheme/

Source: [`Jira\Client\Schema\FieldLayoutSchemePayload`](/src/Schema/FieldLayoutSchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultFieldLayout` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `description` | `string` | The description of the field layout scheme |
| `explicitMappings` | [`array<string,ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | There is a default configuration "fieldlayout" that is applied to all issue types using this scheme that don't have an explicit mapping users can create (or re-use existing) configurations for other issue types and map them to this scheme |
| `name` | `string` | The name of the field layout scheme |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
