# Server Info

DummyDescription

Source: [`Jira\Client\Operations\ServerInfo`](/src/Operations/ServerInfo.php)

## Operations

- [Get Jira Instance Info](#getServerInfo)

## Get Jira Instance Info
<a name="getServerInfo"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-server-info/#api-rest-api-3-server-info-get

Returns information about the Jira instance

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\ServerInformation $response */
$response = $client->getServerInfo();
```

### Request

#### Response

Source: [`Jira\Client\Schema\ServerInformation`](/docs/schema/server-information.md)

Details about the Jira instance.

| Property | Type | Description |
| --- | --- | --- |
| `baseUrl` | `string` | The base URL of the Jira instance. |
| `buildDate` | `string` | The timestamp when the Jira version was built. |
| `buildNumber` | `int` | The build number of the Jira version. |
| `deploymentType` | `string` | The type of server deployment. This is always returned as *Cloud*. |
| `displayUrl` | `string` | The display URL of the Jira instance. |
| `displayUrlConfluence` | `string` | The display URL of Confluence. |
| `displayUrlServicedeskHelpCenter` | `string` | The display URL of the Servicedesk Help Center. |
| `healthChecks` | [`?list<HealthCheckResult>`](/docs/schema/health-check-result.md) | Jira instance health check results. Deprecated and no longer returned. |
| `scmInfo` | `string` | The unique identifier of the Jira version. |
| `serverTime` | `string` | The time in Jira when this request was responded to. |
| `serverTimeZone` | `string` | The default timezone of the Jira server. In a format known as Olson Time Zones, IANA Time Zones or TZ Database Time Zones. |
| `serverTitle` | `string` | The name of the Jira instance. |
| `version` | `string` | The version of Jira. |
| `versionNumbers` | `?list<int>` | The major, minor, and revision version numbers of the Jira version. |
