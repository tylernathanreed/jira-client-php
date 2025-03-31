# Project Feature

Details of a project feature.

Source: [`Jira\Client\Schema\ProjectFeature`](/src/Schema/ProjectFeature.php)

| Property | Type | Description |
| --- | --- | --- |
| `feature` | `` | The key of the feature. |
| `imageUri` | `` | URI for the image representing the feature. |
| `localisedDescription` | `` | Localized display description for the feature. |
| `localisedName` | `` | Localized display name for the feature. |
| `prerequisites` | `?list<string>` | List of keys of the features required to enable the feature. |
| `projectId` | `` | The ID of the project. |
| `state` | `'ENABLED'|'DISABLED'|'COMING_SOON'|null` | The state of the feature. When updating the state of a feature, only ENABLED and DISABLED are supported. Responses can contain all values |
| `toggleLocked` | `` | Whether the state of the feature can be updated. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ContainerForProjectFeatures](/docs/schema/container-for-project-features.md) |
