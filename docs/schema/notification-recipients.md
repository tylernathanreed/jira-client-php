# Notification Recipients

Details of the users and groups to receive the notification.

Source: [`Jira\Client\Schema\NotificationRecipients`](/src/Schema/NotificationRecipients.php)

| Property | Type | Description |
| --- | --- | --- |
| `assignee` | `` | Whether the notification should be sent to the issue's assignees. |
| `groupIds` | `?list<string>` | List of groupIds to receive the notification. |
| `groups` | `?list<GroupName>` | List of groups to receive the notification. |
| `reporter` | `` | Whether the notification should be sent to the issue's reporter. |
| `users` | `?list<UserDetails>` | List of users to receive the notification. |
| `voters` | `` | Whether the notification should be sent to the issue's voters. |
| `watchers` | `` | Whether the notification should be sent to the issue's watchers. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Notification](/docs/schema/notification.md) |
