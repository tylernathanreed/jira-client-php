# Notification Recipients

Details of the users and groups to receive the notification.

Source: [`Jira\Client\Schema\NotificationRecipients`](/src/Schema/NotificationRecipients.php)

| Property | Type | Description |
| --- | --- | --- |
| `assignee` | `bool` | Whether the notification should be sent to the issue's assignees. |
| `groupIds` | `array` | List of groupIds to receive the notification. |
| `groups` | `array` | List of groups to receive the notification. |
| `reporter` | `bool` | Whether the notification should be sent to the issue's reporter. |
| `users` | `array` | List of users to receive the notification. |
| `voters` | `bool` | Whether the notification should be sent to the issue's voters. |
| `watchers` | `bool` | Whether the notification should be sent to the issue's watchers. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Notification](/docs/schema/notification.md) |
