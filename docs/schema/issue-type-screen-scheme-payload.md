# Issue Type Screen Scheme Payload

Defines the payload for the issue type screen schemes.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-type-screen-schemes/\#api-rest-api-3-issuetypescreenscheme-post

Source: [`Jira\Client\Schema\IssueTypeScreenSchemePayload`](/src/Schema/IssueTypeScreenSchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultScreenScheme` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `description` | `string` | The description of the issue type screen scheme |
| `explicitMappings` | [`array<string,ProjectCreateResourceIdentifier>`](/docs/schema/project-create-resource-identifier.md) | The IDs of the screen schemes for the issue type IDs and default. A default entry is required to create an issue type screen scheme, it defines the mapping for all issue types without a screen scheme. |
| `name` | `string` | The name of the issue type screen scheme |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
