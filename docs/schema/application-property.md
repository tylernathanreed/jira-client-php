# Application Property

Details of an application property.

Source: [`Jira\Client\Schema\ApplicationProperty`](/src/Schema/ApplicationProperty.php)

| Property | Type | Description |
| --- | --- | --- |
| `allowedValues` | `?list<string>` | The allowed values, if applicable. |
| `defaultValue` | `string` | The default value of the application property. |
| `desc` | `string` | The description of the application property. |
| `example` | `string` |  |
| `id` | `string` | The ID of the application property. The ID and key are the same. |
| `key` | `string` | The key of the application property. The ID and key are the same. |
| `name` | `string` | The name of the application property. |
| `type` | `string` | The data type of the application property. |
| `value` | `string` | The new value. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [JiraSettings](/docs/operations/jira-settings.md) | [getApplicationProperty](/docs/operations/jira-settings.md#get-application-property) |
| [JiraSettings](/docs/operations/jira-settings.md) | [getAdvancedSettings](/docs/operations/jira-settings.md#get-advanced-settings) |
| [JiraSettings](/docs/operations/jira-settings.md) | [setApplicationProperty](/docs/operations/jira-settings.md#set-application-property) |

### Schema

*None*
