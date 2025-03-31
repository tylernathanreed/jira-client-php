# Filter

Details about a filter.

Source: [`Jira\Client\Schema\Filter`](/src/Schema/Filter.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | `?list<SharePermission>` | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | `User` | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | `?list<SharePermission>` | The groups and projects that the filter is shared with. |
| `sharedUsers` | `UserList` | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | `FilterSubscriptionsList` | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Filters](/docs/operations/filters.md) | [createFilter](/docs/operations/filters.md#create-filter) |
| [Filters](/docs/operations/filters.md) | [getFavouriteFilters](/docs/operations/filters.md#get-favourite-filters) |
| [Filters](/docs/operations/filters.md) | [getMyFilters](/docs/operations/filters.md#get-my-filters) |
| [Filters](/docs/operations/filters.md) | [getFilter](/docs/operations/filters.md#get-filter) |
| [Filters](/docs/operations/filters.md) | [updateFilter](/docs/operations/filters.md#update-filter) |
| [Filters](/docs/operations/filters.md) | [setFavouriteForFilter](/docs/operations/filters.md#set-favourite-for-filter) |
| [Filters](/docs/operations/filters.md) | [deleteFavouriteForFilter](/docs/operations/filters.md#delete-favourite-for-filter) |

### Schema

*None*
