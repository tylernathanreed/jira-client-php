# Issue Limit Report Response Bean


Source: [`Jira\Client\Schema\IssueLimitReportResponseBean`](/src/Schema/IssueLimitReportResponseBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `issuesApproachingLimit` | `object` | A list of ids of issues approaching the limit and their field count |
| `issuesBreachingLimit` | `object` | A list of ids of issues breaching the limit and their field count |
| `limits` | `object` | The fields and their defined limits |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Issues](/docs/operations/issues.md) | [getIssueLimitReport](/docs/operations/issues.md#get-issue-limit-report) |

### Schema

*None*
