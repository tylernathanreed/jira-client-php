# Detailed Error Collection


Source: [`Jira\Client\Schema\DetailedErrorCollection`](/src/Schema/DetailedErrorCollection.php)

| Property | Type | Description |
| --- | --- | --- |
| `details` | `object` | Map of objects representing additional details for an error |
| `errorMessages` | `array` | The list of error messages produced by this operation. For example, "input parameter 'key' must be provided" |
| `errors` | `object` | The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters." |

## References

### Operations

| Group | Operation |
| --- | --- |
| [UIModificationsApps](/docs/operations/u-i-modifications-apps.md) | [createUiModification](/docs/operations/u-i-modifications-apps.md#create-ui-modification) |
| [UIModificationsApps](/docs/operations/u-i-modifications-apps.md) | [updateUiModification](/docs/operations/u-i-modifications-apps.md#update-ui-modification) |

### Schema

*None*
