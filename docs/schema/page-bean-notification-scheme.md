# Page Bean Notification Scheme

A page of items.

Source: [`Jira\Client\Schema\PageBeanNotificationScheme`](/src/Schema/PageBeanNotificationScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<NotificationScheme>`](/docs/schemas/notification-scheme.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [getNotificationSchemes](/docs/operations/issue-notification-schemes.md#get-notification-schemes) |

### Schema

*None*
