# Notification Event

Details about a notification event.

Source: [`Jira\Client\Schema\NotificationEvent`](/src/Schema/NotificationEvent.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the event. |
| `id` | `int` | The ID of the event. The event can be a [Jira system event](https://confluence.atlassian.com/x/8YdKLg#Creatinganotificationscheme-eventsEvents) or a [custom event](https://confluence.atlassian.com/x/AIlKLg). |
| `name` | `string` | The name of the event. |
| `templateEvent` | [`NotificationEvent`](/docs/schema/notification-event.md) | The template of the event. Only custom events configured by Jira administrators have template. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [NotificationSchemeEvent](/docs/schema/notification-scheme-event.md) |
