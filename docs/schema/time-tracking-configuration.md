# Time Tracking Configuration

Details of the time tracking configuration.

Source: [`Jira\Client\Schema\TimeTrackingConfiguration`](/src/Schema/TimeTrackingConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultUnit` | `'minute'\|'hour'\|'day'\|'week'` | The default unit of time applied to logged time. |
| `timeFormat` | `'pretty'\|'days'\|'hours'` | The format that will appear on an issue's *Time Spent* field. |
| `workingDaysPerWeek` | `float` | The number of days in a working week. |
| `workingHoursPerDay` | `float` | The number of hours in a working day. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TimeTracking](/docs/operations/time-tracking.md) | [getSharedTimeTrackingConfiguration](/docs/operations/time-tracking.md#get-shared-time-tracking-configuration) |
| [TimeTracking](/docs/operations/time-tracking.md) | [setSharedTimeTrackingConfiguration](/docs/operations/time-tracking.md#set-shared-time-tracking-configuration) |

### Schema

| Schema |
| --- |
| [Configuration](/docs/schema/configuration.md) |
