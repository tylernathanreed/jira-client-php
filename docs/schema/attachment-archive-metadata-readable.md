# Attachment Archive Metadata Readable

Metadata for an archive (for example a zip) and its contents.

Source: [`Jira\Client\Schema\AttachmentArchiveMetadataReadable`](/src/Schema/AttachmentArchiveMetadataReadable.php)

| Property | Type | Description |
| --- | --- | --- |
| `entries` | `?list<AttachmentArchiveItemReadable>` | The list of the items included in the archive. |
| `id` | `` | The ID of the attachment. |
| `mediaType` | `` | The MIME type of the attachment. |
| `name` | `` | The name of the archive file. |
| `totalEntryCount` | `` | The number of items included in the archive. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueAttachments](/docs/operations/issue-attachments.md) | [expandAttachmentForHumans](/docs/operations/issue-attachments.md#expand-attachment-for-humans) |

### Schema

*None*
