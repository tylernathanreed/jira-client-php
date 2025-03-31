# Version Issue Counts

Various counts of issues within a version.

Source: [`Jira\Client\Schema\VersionIssueCounts`](/src/Schema/VersionIssueCounts.php)

| Property | Type | Description |
| --- | --- | --- |
| `customFieldUsage` | `?list<VersionUsageInCustomField>` | List of custom fields using the version. |
| `issueCountWithCustomFieldsShowingVersion` | `` | Count of issues where a version custom field is set to the version. |
| `issuesAffectedCount` | `` | Count of issues where the `affectedVersion` is set to the version. |
| `issuesFixedCount` | `` | Count of issues where the `fixVersion` is set to the version. |
| `self` | `` | The URL of these count details. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [getVersionRelatedIssues](/docs/operations/project-versions.md#get-version-related-issues) |

### Schema

*None*
