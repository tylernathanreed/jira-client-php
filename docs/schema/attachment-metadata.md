# Attachment Metadata

Metadata for an issue attachment.

Source: [`Jira\Client\Schema\AttachmentMetadata`](/src/Schema/AttachmentMetadata.php)

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`User`](/docs/schema/user.md) | Details of the user who attached the file. |
| `content` | `string` | The URL of the attachment. |
| `created` | `string` | The datetime the attachment was created. |
| `filename` | `string` | The name of the attachment file. |
| `id` | `int` | The ID of the attachment. |
| `mimeType` | `string` | The MIME type of the attachment. |
| `properties` | `array<string,mixed>` | Additional properties of the attachment. |
| `self` | `string` | The URL of the attachment metadata details. |
| `size` | `int` | The size of the attachment. |
| `thumbnail` | `string` | The URL of a thumbnail representing the attachment. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueAttachments](/docs/operations/issue-attachments.md) | [getAttachment](/docs/operations/issue-attachments.md#get-attachment) |

### Schema

*None*
