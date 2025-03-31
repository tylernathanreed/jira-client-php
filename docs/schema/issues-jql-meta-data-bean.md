# Issues Jql Meta Data Bean

The description of the page of issues loaded by the provided JQL query.

Source: [`Jira\Client\Schema\IssuesJqlMetaDataBean`](/src/Schema/IssuesJqlMetaDataBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `count` | `int` | The number of issues that were loaded in this evaluation. |
| `maxResults` | `int` | The maximum number of issues that could be loaded in this evaluation. |
| `startAt` | `int` | The index of the first issue. |
| `totalCount` | `int` | The total number of issues the JQL returned. |
| `validationWarnings` | `?list<string>` | Any warnings related to the JQL query. Present only if the validation mode was set to `warn`. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssuesMetaBean](/docs/schema/issues-meta-bean.md) |
