# Jexp Evaluate Ctx Jql Issues

The JQL specifying the issues available in the evaluated Jira expression under the `issues` context variable.
Not all issues returned by the JQL query are loaded, only those described by the `nextPageToken` and `maxResults` properties.
This bean will be replacing JexpJqlIssues bean as part of new `evaluate` endpoint

Source: [`Jira\Client\Schema\JexpEvaluateCtxJqlIssues`](/src/Schema/JexpEvaluateCtxJqlIssues.php)

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of issues to return from the JQL query. max results value considered may be lower than the number specific here. |
| `nextPageToken` | `string` | The token for a page to fetch that is not the first page. The first page has a `nextPageToken` of `null`. Use the `nextPageToken` to fetch the next page of issues. |
| `query` | `string` | The JQL query, required to be bounded. Additionally, `orderBy` clause can contain a maximum of 7 fields |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [JexpEvaluateCtxIssues](/docs/schema/jexp-evaluate-ctx-issues.md) |
