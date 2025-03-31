# Notification

Details about a notification.

Source: [`Jira\Client\Schema\Notification`](/src/Schema/Notification.php)

| Property | Type | Description |
| --- | --- | --- |
| `htmlBody` | `string` | The HTML body of the email notification for the issue. |
| `restrict` | [`NotificationRecipientsRestrictions`](/docs/schema/notification-recipients-restrictions.md) | Restricts the notifications to users with the specified permissions. |
| `subject` | `string` | The subject of the email notification for the issue. If this is not specified, then the subject is set to the issue key and summary. |
| `textBody` | `string` | The plain text body of the email notification for the issue. |
| `to` | [`NotificationRecipients`](/docs/schema/notification-recipients.md) | The recipients of the email notification for the issue. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [notify](/docs/operations/issues.md#notify) |

### Schema

*None*
