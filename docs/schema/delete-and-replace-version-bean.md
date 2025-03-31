# Delete And Replace Version Bean


Source: [`Jira\Client\Schema\DeleteAndReplaceVersionBean`](/src/Schema/DeleteAndReplaceVersionBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `customFieldReplacementList` | [`?list<CustomFieldReplacement>`](/docs/schema/custom-field-replacement.md) | An array of custom field IDs (`customFieldId`) and version IDs (`moveTo`) to update when the fields contain the deleted version. |
| `moveAffectedIssuesTo` | `int` | The ID of the version to update `affectedVersion` to when the field contains the deleted version. |
| `moveFixIssuesTo` | `int` | The ID of the version to update `fixVersion` to when the field contains the deleted version. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [deleteAndReplaceVersion](/docs/operations/project-versions.md#delete-and-replace-version) |

### Schema

*None*
