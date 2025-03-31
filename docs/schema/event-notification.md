# Event Notification

Details about a notification associated with an event.

Source: [`Jira\Client\Schema\EventNotification`](/src/Schema/EventNotification.php)

| Property | Type | Description |
| --- | --- | --- |
| `emailAddress` | `` | The email address. |
| `expand` | `` | Expand options that include additional event notification details in the response. |
| `field` | `` | The custom user or group field. |
| `group` | `` | The specified group. |
| `id` | `` | The ID of the notification. |
| `notificationType` | `'CurrentAssignee'|'Reporter'|'CurrentUser'|'ProjectLead'|'ComponentLead'|'User'|'Group'|'ProjectRole'|'EmailAddress'|'AllWatchers'|'UserCustomField'|'GroupCustomField'|null` | Identifies the recipients of the notification. |
| `parameter` | `` | As a group's name can change, use of `recipient` is recommended. The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by `notificationType` value. So, when `notificationType` is:

 *  `User` The `parameter` is the user account ID.
 *  `Group` The `parameter` is the group name.
 *  `ProjectRole` The `parameter` is the project role ID.
 *  `UserCustomField` The `parameter` is the ID of the custom field.
 *  `GroupCustomField` The `parameter` is the ID of the custom field. |
| `projectRole` | `` | The specified project role. |
| `recipient` | `` | The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by the `notificationType` value. So, when `notificationType` is:

 *  `User`, `recipient` is the user account ID.
 *  `Group`, `recipient` is the group ID.
 *  `ProjectRole`, `recipient` is the project role ID.
 *  `UserCustomField`, `recipient` is the ID of the custom field.
 *  `GroupCustomField`, `recipient` is the ID of the custom field. |
| `user` | `` | The specified user. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [NotificationSchemeEvent](/docs/schema/notification-scheme-event.md) |
