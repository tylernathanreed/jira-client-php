# Page Of Dashboards

A page containing dashboard details.

Source: [`Jira\Client\Schema\PageOfDashboards`](/src/Schema/PageOfDashboards.php)

| Property | Type | Description |
| --- | --- | --- |
| `dashboards` | `?list<Dashboard>` | List of dashboards. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `next` | `string` | The URL of the next page of results, if any. |
| `prev` | `string` | The URL of the previous page of results, if any. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [getAllDashboards](/docs/operations/dashboards.md#get-all-dashboards) |

### Schema

*None*
