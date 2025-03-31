# Filter Details

Details of a filter.

Source: [`Jira\Client\Schema\FilterDetails`](/src/Schema/FilterDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The name of the filter. |
| `approximateLastUsed` | `` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `` | The description of the filter. |
| `editPermissions` | `?list<SharePermission>` | The groups and projects that can edit the filter. This can be specified when updating a filter, but not when creating a filter. |
| `expand` | `` | Expand options that include additional filter details in the response. |
| `favourite` | `` | Whether the filter is selected as a favorite by any users, not including the filter owner. |
| `favouritedCount` | `` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `` | The unique identifier for the filter. |
| `jql` | `` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | `` | The user who owns the filter. Defaults to the creator of the filter, however, Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `` | The URL of the filter. |
| `sharePermissions` | `?list<SharePermission>` | The groups and projects that the filter is shared with. This can be specified when updating a filter, but not when creating a filter. |
| `subscriptions` | `?list<FilterSubscription>` | The users that are subscribed to the filter. |
| `viewUrl` | `` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanFilterDetails](/docs/schema/page-bean-filter-details.md) |
