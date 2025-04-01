# Detailed Error Collection


Source: [`Jira\Client\Schema\DetailedErrorCollection`](/src/Schema/DetailedErrorCollection.php)

| Property | Type | Description |
| --- | --- | --- |
| `details` | `array<string,mixed>` | Map of objects representing additional details for an error |
| `errorMessages` | `?list<string>` | The list of error messages produced by this operation. For example, "input parameter 'key' must be provided" |
| `errors` | `array<string,string>` | The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters." |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UIModificationsApps](/docs/operations/ui-modifications-apps.md) | [createUiModification](/docs/operations/ui-modifications-apps.md#create-ui-modification) |
| [UIModificationsApps](/docs/operations/ui-modifications-apps.md) | [updateUiModification](/docs/operations/ui-modifications-apps.md#update-ui-modification) |

### Schema

*None*
