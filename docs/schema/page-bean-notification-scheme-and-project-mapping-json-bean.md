# Page Bean Notification Scheme And Project Mapping Json Bean

A page of items.

Source: [`Jira\Client\Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean`](/src/Schema/PageBeanNotificationSchemeAndProjectMappingJsonBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<NotificationSchemeAndProjectMappingJsonBean>`](/docs/schema/notification-scheme-and-project-mapping-json-bean.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [getNotificationSchemeToProjectMappings](/docs/operations/issue-notification-schemes.md#get-notification-scheme-to-project-mappings) |

### Schema

*None*
