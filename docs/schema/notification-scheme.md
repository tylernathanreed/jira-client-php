# Notification Scheme

Details about a notification scheme.

Source: [`Jira\Client\Schema\NotificationScheme`](src/Schema/NotificationScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the notification scheme. |
| `expand` | `string` | Expand options that include additional notification scheme details in the response. |
| `id` | `int` | The ID of the notification scheme. |
| `name` | `string` | The name of the notification scheme. |
| `notificationSchemeEvents` | `array` | The notification events and associated recipients. |
| `projects` | `array` | The list of project IDs associated with the notification scheme. |
| `scope` | `Scope` | The scope of the notification scheme. |
| `self` | `string` |  |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [getNotificationScheme](/docs/operations/issue-notification-schemes.md#get-notification-scheme) |
| [Projects](/docs/operations/projects.md) | [getNotificationSchemeForProject](/docs/operations/projects.md#get-notification-scheme-for-project) |

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanNotificationScheme](/docs/schema/page-bean-notification-scheme.md) |
