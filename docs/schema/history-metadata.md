# History Metadata

Details of issue history metadata.

Source: [`Jira\Client\Schema\HistoryMetadata`](/src/Schema/HistoryMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `activityDescription` | `string` | The activity described in the history record. |
| `activityDescriptionKey` | `string` | The key of the activity described in the history record. |
| `actor` | `HistoryMetadataParticipant` | Details of the user whose action created the history record. |
| `cause` | `HistoryMetadataParticipant` | Details of the cause that triggered the creation the history record. |
| `description` | `string` | The description of the history record. |
| `descriptionKey` | `string` | The description key of the history record. |
| `emailDescription` | `string` | The description of the email address associated the history record. |
| `emailDescriptionKey` | `string` | The description key of the email address associated the history record. |
| `extraData` | `object` | Additional arbitrary information about the history record. |
| `generator` | `HistoryMetadataParticipant` | Details of the system that generated the history record. |
| `type` | `string` | The type of the history record. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Changelog](/docs/schema/changelog.md) |
| [IssueUpdateDetails](/docs/schema/issue-update-details.md) |
