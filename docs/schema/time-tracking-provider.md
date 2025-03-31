# Time Tracking Provider

Details about the time tracking provider.

Source: [`Jira\Client\Schema\TimeTrackingProvider`](/src/Schema/TimeTrackingProvider.php)

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key for the time tracking provider. For example, *JIRA*. |
| `name` | `string` | The name of the time tracking provider. For example, *JIRA provided time tracking*. |
| `url` | `string` | The URL of the configuration page for the time tracking provider app. For example, */example/config/url*. This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [TimeTracking](/docs/operations/time-tracking.md) | [getSelectedTimeTrackingImplementation](/docs/operations/time-tracking.md#get-selected-time-tracking-implementation) |
| [TimeTracking](/docs/operations/time-tracking.md) | [selectTimeTrackingImplementation](/docs/operations/time-tracking.md#select-time-tracking-implementation) |
| [TimeTracking](/docs/operations/time-tracking.md) | [getAvailableTimeTrackingImplementations](/docs/operations/time-tracking.md#get-available-time-tracking-implementations) |

### Schema

*None*
