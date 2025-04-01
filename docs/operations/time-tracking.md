# Time Tracking

Source: [`Jira\Client\Operations\TimeTracking`](/src/Operations/TimeTracking.php)

## Operations

- [Get Selected Time Tracking Provider](#getSelectedTimeTrackingImplementation)
- [Select Time Tracking Provider](#selectTimeTrackingImplementation)
- [Get All Time Tracking Providers](#getAvailableTimeTrackingImplementations)
- [Get Time Tracking Settings](#getSharedTimeTrackingConfiguration)
- [Set Time Tracking Settings](#setSharedTimeTrackingConfiguration)

## Get Selected Time Tracking Provider
<a name="getSelectedTimeTrackingImplementation"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-time-tracking/#api-rest-api-3-configuration-timetracking-get

Returns the time tracking provider that is currently selected.
Note that if time tracking is disabled, then a successful but empty response is returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\TimeTrackingProvider $response */
$response = $client->getSelectedTimeTrackingImplementation();
```

### Request

#### Response

Source: [`Jira\Client\Schema\TimeTrackingProvider`](/docs/schema/time-tracking-provider.md)

Details about the time tracking provider.

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key for the time tracking provider. For example, *JIRA*. |
| `name` | `string` | The name of the time tracking provider. For example, *JIRA provided time tracking*. |
| `url` | `string` | The URL of the configuration page for the time tracking provider app. For example, */example/config/url*. This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app. |


## Select Time Tracking Provider
<a name="selectTimeTrackingImplementation"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-time-tracking/#api-rest-api-3-configuration-timetracking-put

Selects a time tracking provider

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->selectTimeTrackingImplementation(new Schema\TimeTrackingProvider(
    key: 'Jira',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\TimeTrackingProvider`](/docs/schema/time-tracking-provider.md)

Details about the time tracking provider.

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key for the time tracking provider. For example, *JIRA*. |
| `name` | `string` | The name of the time tracking provider. For example, *JIRA provided time tracking*. |
| `url` | `string` | The URL of the configuration page for the time tracking provider app. For example, */example/config/url*. This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app. |

#### Response

`true`
## Get All Time Tracking Providers
<a name="getAvailableTimeTrackingImplementations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-time-tracking/#api-rest-api-3-configuration-timetracking-list-get

Returns all time tracking providers.
By default, Jira only has one time tracking provider: *JIRA provided time tracking*.
However, you can install other time tracking providers via apps from the Atlassian Marketplace.
For more information on time tracking providers, see the documentation for the " Time Tracking Provider" module

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/modules/time-tracking-provider/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getAvailableTimeTrackingImplementations();
```

### Request

#### Response


## Get Time Tracking Settings
<a name="getSharedTimeTrackingConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-time-tracking/#api-rest-api-3-configuration-timetracking-options-get

Returns the time tracking settings.
This includes settings such as the time format, default time unit, and others.
For more information, see "Configuring time tracking"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/qoXKM
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\TimeTrackingConfiguration $response */
$response = $client->getSharedTimeTrackingConfiguration();
```

### Request

#### Response

Source: [`Jira\Client\Schema\TimeTrackingConfiguration`](/docs/schema/time-tracking-configuration.md)

Details of the time tracking configuration.

| Property | Type | Description |
| --- | --- | --- |
| `defaultUnit` | `'minute'\|'hour'\|'day'\|'week'` | The default unit of time applied to logged time. |
| `timeFormat` | `'pretty'\|'days'\|'hours'` | The format that will appear on an issue's *Time Spent* field. |
| `workingDaysPerWeek` | `float` | The number of days in a working week. |
| `workingHoursPerDay` | `float` | The number of hours in a working day. |


## Set Time Tracking Settings
<a name="setSharedTimeTrackingConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-time-tracking/#api-rest-api-3-configuration-timetracking-options-put

Sets the time tracking settings

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\TimeTrackingConfiguration $response */
$response = $client->setSharedTimeTrackingConfiguration(new Schema\TimeTrackingConfiguration(
    defaultUnit: 'hour',
    timeFormat: 'pretty',
    workingDaysPerWeek: '5.5',
    workingHoursPerDay: '7.6',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\TimeTrackingConfiguration`](/docs/schema/time-tracking-configuration.md)

Details of the time tracking configuration.

| Property | Type | Description |
| --- | --- | --- |
| `defaultUnit` | `'minute'\|'hour'\|'day'\|'week'` | The default unit of time applied to logged time. |
| `timeFormat` | `'pretty'\|'days'\|'hours'` | The format that will appear on an issue's *Time Spent* field. |
| `workingDaysPerWeek` | `float` | The number of days in a working week. |
| `workingHoursPerDay` | `float` | The number of hours in a working day. |

#### Response

Source: [`Jira\Client\Schema\TimeTrackingConfiguration`](/docs/schema/time-tracking-configuration.md)

Details of the time tracking configuration.

| Property | Type | Description |
| --- | --- | --- |
| `defaultUnit` | `'minute'\|'hour'\|'day'\|'week'` | The default unit of time applied to logged time. |
| `timeFormat` | `'pretty'\|'days'\|'hours'` | The format that will appear on an issue's *Time Spent* field. |
| `workingDaysPerWeek` | `float` | The number of days in a working week. |
| `workingHoursPerDay` | `float` | The number of hours in a working day. |
