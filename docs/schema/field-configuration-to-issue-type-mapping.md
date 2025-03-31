# Field Configuration To Issue Type Mapping

The field configuration to issue type mapping.

Source: [`Jira\Client\Schema\FieldConfigurationToIssueTypeMapping`](/src/Schema/FieldConfigurationToIssueTypeMapping.php)

| Property | Type | Description |
| --- | --- | --- |
| `fieldConfigurationId` | `string` | The ID of the field configuration. |
| `issueTypeId` | `string` | The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration. An issue type can be included only once in a request. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [AssociateFieldConfigurationsWithIssueTypesRequest](/docs/schema/associate-field-configurations-with-issue-types-request.md) |
