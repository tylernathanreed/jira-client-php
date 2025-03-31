# Page Bean Comment

A page of items.

Source: [`Jira\Client\Schema\PageBeanComment`](/src/Schema/PageBeanComment.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Comment>`](/docs/schema/comment.md) | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueComments](/docs/operations/issue-comments.md) | [getCommentsByIds](/docs/operations/issue-comments.md#get-comments-by-ids) |

### Schema

*None*
