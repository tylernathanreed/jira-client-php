# Filter Subscriptions List

A paginated list of subscriptions to a filter.

Source: [`Jira\Client\Schema\FilterSubscriptionsList`](/src/Schema/FilterSubscriptionsList.php)

| Property | Type | Description |
| --- | --- | --- |
| `end-index` | `int` | The index of the last item returned on the page. |
| `items` | [`?list<FilterSubscription>`](/src/Schema/FilterSubscription.php) | The list of items. |
| `max-results` | `int` | The maximum number of results that could be on the page. |
| `size` | `int` | The number of items on the page. |
| `start-index` | `int` | The index of the first item returned on the page. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Filter](/docs/schema/filter.md) |
