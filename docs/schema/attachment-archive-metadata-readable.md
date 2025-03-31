# Attachment Archive Metadata Readable

Metadata for an archive (for example a zip) and its contents.

Source: [`Jira\Client\Schema\AttachmentArchiveMetadataReadable`](/src/Schema/AttachmentArchiveMetadataReadable.php)

| Property | Type | Description |
| --- | --- | --- |
| `entries` | [`?list<AttachmentArchiveItemReadable>`](/docs/schemas/attachment-archive-item-readable.md) | The list of the items included in the archive. |
| `id` | `int` | The ID of the attachment. |
| `mediaType` | `string` | The MIME type of the attachment. |
| `name` | `string` | The name of the archive file. |
| `totalEntryCount` | `int` | The number of items included in the archive. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueAttachments](/docs/operations/issue-attachments.md) | [expandAttachmentForHumans](/docs/operations/issue-attachments.md#expand-attachment-for-humans) |

### Schema

*None*
