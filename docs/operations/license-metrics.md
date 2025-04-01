# License Metrics

Source: [`Jira\Client\Operations\LicenseMetrics`](/src/Operations/LicenseMetrics.php)

## Operations

- [Get License](#getLicense)
- [Get Approximate License Count](#getApproximateLicenseCount)
- [Get Approximate Application License Count](#getApproximateApplicationLicenseCount)

## Get License
<a name="getLicense"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-license-metrics/#api-rest-api-3-instance-license-get

Returns licensing information about the Jira instance

**"Permissions" required:** None.

### Example

```php
/** @var Schema\License $response */
$response = $client->getLicense();
```

### Request

#### Response

Source: [`Jira\Client\Schema\License`](/docs/schema/license.md)

Details about a license for the Jira instance.

| Property | Type | Description |
| --- | --- | --- |
| `applications` | [`list<LicensedApplication>`](/docs/schema/licensed-application.md) | The applications under this license. |


## Get Approximate License Count
<a name="getApproximateLicenseCount"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-license-metrics/#api-rest-api-3-license-approximate-license-count-get

Returns the approximate number of user accounts across all Jira licenses.
Note that this information is cached with a 7-day lifecycle and could be stale at the time of call

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\LicenseMetric $response */
$response = $client->getApproximateLicenseCount();
```

### Request

#### Response

Source: [`Jira\Client\Schema\LicenseMetric`](/docs/schema/license-metric.md)

A metric that provides insight into the active licence details

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of a specific license metric. |
| `value` | `string` | The calculated value of a licence metric linked to the key. An example licence metric is the approximate number of user accounts. |


## Get Approximate Application License Count
<a name="getApproximateApplicationLicenseCount"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-license-metrics/#api-rest-api-3-license-approximate-license-count-product-application-key-get

Returns the total approximate number of user accounts for a single Jira license.
Note that this information is cached with a 7-day lifecycle and could be stale at the time of call

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\LicenseMetric $response */
$response = $client->getApproximateApplicationLicenseCount(
    applicationKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `applicationKey` | `'jira-core'\|`<br/>`'jira-product-discovery'\|`<br/>`'jira-software'\|`<br/>`'jira-servicedesk'` | The ID of the application, represents a specific version of Jira. |

#### Response

Source: [`Jira\Client\Schema\LicenseMetric`](/docs/schema/license-metric.md)

A metric that provides insight into the active licence details

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of a specific license metric. |
| `value` | `string` | The calculated value of a licence metric linked to the key. An example licence metric is the approximate number of user accounts. |
