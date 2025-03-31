# Event Notification

Details about a notification associated with an event.

Source: [`Jira\Client\Schema\EventNotification`](/src/Schema/EventNotification.php)

| Property | Type | Description |
| --- | --- | --- |
| `emailAddress` | `string` | The email address. |
| `expand` | `string` | Expand options that include additional event notification details in the response. |
| `field` | [`FieldDetails`](/docs/schema/field-details.md) | The custom user or group field. |
| `group` | [`GroupName`](/docs/schema/group-name.md) | The specified group. |
| `id` | `int` | The ID of the notification. |
| `notificationType` | `'CurrentAssignee'\|'Reporter'\|'CurrentUser'\|'ProjectLead'\|'ComponentLead'\|'User'\|'Group'\|'ProjectRole'\|'EmailAddress'\|'AllWatchers'\|'UserCustomField'\|'GroupCustomField'\|null` | Identifies the recipients of the notification. |
| `parameter` | `string` | As a group's name can change, use of `recipient` is recommended. The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by `notificationType` value. So, when `notificationType` is:<br/><br/> *  `User` The `parameter` is the user account ID.<br/> *  `Group` The `parameter` is the group name.<br/> *  `ProjectRole` The `parameter` is the project role ID.<br/> *  `UserCustomField` The `parameter` is the ID of the custom field.<br/> *  `GroupCustomField` The `parameter` is the ID of the custom field. |
| `projectRole` | [`ProjectRole`](/docs/schema/project-role.md) | The specified project role. |
| `recipient` | `string` | The identifier associated with the `notificationType` value that defines the receiver of the notification, where the receiver isn't implied by the `notificationType` value. So, when `notificationType` is:<br/><br/> *  `User`, `recipient` is the user account ID.<br/> *  `Group`, `recipient` is the group ID.<br/> *  `ProjectRole`, `recipient` is the project role ID.<br/> *  `UserCustomField`, `recipient` is the ID of the custom field.<br/> *  `GroupCustomField`, `recipient` is the ID of the custom field. |
| `user` | [`UserDetails`](/docs/schema/user-details.md) | The specified user. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [NotificationSchemeEvent](/docs/schema/notification-scheme-event.md) |
