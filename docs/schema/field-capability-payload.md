# Field Capability Payload

Defines the payload for the fields, screens, screen schemes, issue type screen schemes, field layouts, and field layout schemes

Source: [`Jira\Client\Schema\FieldCapabilityPayload`](/src/Schema/FieldCapabilityPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `customFieldDefinitions` | [`?list<CustomFieldPayload>`](/docs/schema/custom-field-payload.md) | The custom field definitions. See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/\#api-rest-api-3-field-post |
| `fieldLayoutScheme` | [`FieldLayoutSchemePayload`](/docs/schema/field-layout-scheme-payload.md) |  |
| `fieldLayouts` | [`?list<FieldLayoutPayload>`](/docs/schema/field-layout-payload.md) | The field layouts configuration. |
| `issueLayouts` | [`?list<IssueLayoutPayload>`](/docs/schema/issue-layout-payload.md) | The issue layouts configuration |
| `issueTypeScreenScheme` | [`IssueTypeScreenSchemePayload`](/docs/schema/issue-type-screen-scheme-payload.md) |  |
| `screenScheme` | [`?list<ScreenSchemePayload>`](/docs/schema/screen-scheme-payload.md) | The screen schemes See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/\#api-rest-api-3-screenscheme-post |
| `screens` | [`?list<ScreenPayload>`](/docs/schema/screen-payload.md) | The screens. See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/\#api-rest-api-3-screens-post |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
