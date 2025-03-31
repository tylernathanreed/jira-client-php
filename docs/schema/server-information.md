# Server Information

Details about the Jira instance.

Source: [`Jira\Client\Schema\ServerInformation`](/src/Schema/ServerInformation.php)

| Property | Type | Description |
| --- | --- | --- |
| `baseUrl` | `string` | The base URL of the Jira instance. |
| `buildDate` | `string` | The timestamp when the Jira version was built. |
| `buildNumber` | `int` | The build number of the Jira version. |
| `deploymentType` | `string` | The type of server deployment. This is always returned as *Cloud*. |
| `displayUrl` | `string` | The display URL of the Jira instance. |
| `displayUrlConfluence` | `string` | The display URL of Confluence. |
| `displayUrlServicedeskHelpCenter` | `string` | The display URL of the Servicedesk Help Center. |
| `healthChecks` | `?list<[HealthCheckResult](/src/Schema/HealthCheckResult.php)>` | Jira instance health check results. Deprecated and no longer returned. |
| `scmInfo` | `string` | The unique identifier of the Jira version. |
| `serverTime` | `string` | The time in Jira when this request was responded to. |
| `serverTimeZone` | `string` | The default timezone of the Jira server. In a format known as Olson Time Zones, IANA Time Zones or TZ Database Time Zones. |
| `serverTitle` | `string` | The name of the Jira instance. |
| `version` | `string` | The version of Jira. |
| `versionNumbers` | `?list<int>` | The major, minor, and revision version numbers of the Jira version. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ServerInfo](/docs/operations/server-info.md) | [getServerInfo](/docs/operations/server-info.md#get-server-info) |

### Schema

*None*
