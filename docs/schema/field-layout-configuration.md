# Field Layout Configuration

Defines the payload for the field layout configuration.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/\#api-rest-api-3-fieldconfiguration-post

Source: [`Jira\Client\Schema\FieldLayoutConfiguration`](/src/Schema/FieldLayoutConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `field` | `bool` | Whether to show the field |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `required` | `bool` | Whether the field is required |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldLayoutPayload](/docs/schema/field-layout-payload.md) |
