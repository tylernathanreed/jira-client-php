# Page Bean Comment

A page of items.

Source: [`Jira\Client\Schema\PageBeanComment`](/src/Schema/PageBeanComment.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `` | Whether this is the last page. |
| `maxResults` | `` | The maximum number of items that could be returned. |
| `nextPage` | `` | If there is another page of results, the URL of the next page. |
| `self` | `` | The URL of the page. |
| `startAt` | `` | The index of the first item returned. |
| `total` | `` | The number of items returned. |
| `values` | `?list<Comment>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueComments](/docs/operations/issue-comments.md) | [getCommentsByIds](/docs/operations/issue-comments.md#get-comments-by-ids) |

### Schema

*None*
