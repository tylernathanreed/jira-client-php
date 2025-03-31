# Project Feature

Details of a project feature.

Source: [`Jira\Client\Schema\ProjectFeature`](src/Schema/ProjectFeature.php)

| Property | Type | Description |
| --- | --- | --- |
| `feature` | `string` | The key of the feature. |
| `imageUri` | `string` | URI for the image representing the feature. |
| `localisedDescription` | `string` | Localized display description for the feature. |
| `localisedName` | `string` | Localized display name for the feature. |
| `prerequisites` | `array` | List of keys of the features required to enable the feature. |
| `projectId` | `int` | The ID of the project. |
| `state` | `string` | The state of the feature. When updating the state of a feature, only ENABLED and DISABLED are supported. Responses can contain all values |
| `toggleLocked` | `bool` | Whether the state of the feature can be updated. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ContainerForProjectFeatures](/docs/schema/container-for-project-features.md) |
