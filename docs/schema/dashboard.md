# Dashboard

Details of a dashboard.

Source: [`Jira\Client\Schema\Dashboard`](/src/Schema/Dashboard.php)

| Property | Type | Description |
| --- | --- | --- |
| `automaticRefreshMs` | `int` | The automatic refresh interval for the dashboard in milliseconds. |
| `description` | `string` |  |
| `editPermissions` | [`?list<SharePermission>`](/src/Schema/SharePermission.php) | The details of any edit share permissions for the dashboard. |
| `id` | `string` | The ID of the dashboard. |
| `isFavourite` | `bool` | Whether the dashboard is selected as a favorite by the user. |
| `isWritable` | `bool` | Whether the current user has permission to edit the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `owner` | `UserBean` | The owner of the dashboard. |
| `popularity` | `int` | The number of users who have this dashboard as a favorite. |
| `rank` | `int` | The rank of this dashboard. |
| `self` | `string` | The URL of these dashboard details. |
| `sharePermissions` | [`?list<SharePermission>`](/src/Schema/SharePermission.php) | The details of any view share permissions for the dashboard. |
| `systemDashboard` | `bool` | Whether the current dashboard is system dashboard. |
| `view` | `string` | The URL of the dashboard. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Dashboards](/docs/operations/dashboards.md) | [createDashboard](/docs/operations/dashboards.md#create-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboard](/docs/operations/dashboards.md#get-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [updateDashboard](/docs/operations/dashboards.md#update-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [copyDashboard](/docs/operations/dashboards.md#copy-dashboard) |

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanDashboard](/docs/schema/page-bean-dashboard.md) |
| [PageOfDashboards](/docs/schema/page-of-dashboards.md) |
