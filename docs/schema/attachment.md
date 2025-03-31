# Attachment

Details about an attachment.

Source: [`Jira\Client\Schema\Attachment`](/src/Schema/Attachment.php)

| Property | Type | Description |
| --- | --- | --- |
| `author` | `UserDetails` | Details of the user who added the attachment. |
| `content` | `string` | The content of the attachment. |
| `created` | `string` | The datetime the attachment was created. |
| `filename` | `string` | The file name of the attachment. |
| `id` | `string` | The ID of the attachment. |
| `mimeType` | `string` | The MIME type of the attachment. |
| `self` | `string` | The URL of the attachment details response. |
| `size` | `int` | The size of the attachment. |
| `thumbnail` | `string` | The URL of a thumbnail representing the attachment. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueAttachments](/docs/operations/issue-attachments.md) | [addAttachment](/docs/operations/issue-attachments.md#add-attachment) |

### Schema

| Group | Operation |
| --- | --- |
| [LegacyJackson1ListAttachment](/docs/schema/legacy-jackson1-list-attachment.md) |
