# Custom Field Payload

Defines the payload for the custom field definitions.
See https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/\#api-rest-api-3-field-post

Source: [`Jira\Client\Schema\CustomFieldPayload`](/src/Schema/CustomFieldPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `cfType` | `string` | The type of the custom field |
| `description` | `string` | The description of the custom field |
| `name` | `string` | The name of the custom field |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The strategy to use when there is a conflict with an existing custom field. FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |
| `searcherKey` | `string` | The searcher key of the custom field |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FieldCapabilityPayload](/docs/schema/field-capability-payload.md) |
