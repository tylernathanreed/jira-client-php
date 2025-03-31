# Page Bean Notification Scheme And Project Mapping Json Bean

A page of items.

Source: [`Jira\Client\Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean`](/src/Schema/PageBeanNotificationSchemeAndProjectMappingJsonBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<NotificationSchemeAndProjectMappingJsonBean>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [getNotificationSchemeToProjectMappings](/docs/operations/issue-notification-schemes.md#get-notification-scheme-to-project-mappings) |

### Schema

*None*
