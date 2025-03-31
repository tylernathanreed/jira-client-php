# Notification Recipients Restrictions

Details of the group membership or permissions needed to receive the notification.

Source: [`Jira\Client\Schema\NotificationRecipientsRestrictions`](/src/Schema/NotificationRecipientsRestrictions.php)

| Property | Type | Description |
| --- | --- | --- |
| `groupIds` | `?list<string>` | List of groupId memberships required to receive the notification. |
| `groups` | [`?list<GroupName>`](/docs/schemas/group-name.md) | List of group memberships required to receive the notification. |
| `permissions` | [`?list<RestrictedPermission>`](/docs/schemas/restricted-permission.md) | List of permissions required to receive the notification. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Notification](/docs/schema/notification.md) |
