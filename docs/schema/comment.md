# Comment

A comment.

Source: [`Jira\Client\Schema\Comment`](/src/Schema/Comment.php)

| Property | Type | Description |
| --- | --- | --- |
| `author` | `` | The ID of the user who created the comment. |
| `body` | `` | The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). |
| `created` | `` | The date and time at which the comment was created. |
| `id` | `` | The ID of the comment. |
| `jsdAuthorCanSeeRequest` | `` | Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature. |
| `jsdPublic` | `` | Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation. |
| `properties` | `?list<EntityProperty>` | A list of comment properties. Optional on create and update. |
| `renderedBody` | `` | The rendered version of the comment. |
| `self` | `` | The URL of the comment. |
| `updateAuthor` | `` | The ID of the user who updated the comment last. |
| `updated` | `` | The date and time at which the comment was updated last. |
| `visibility` | `` | The group or role to which this comment is visible. Optional on create and update. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueComments](/docs/operations/issue-comments.md) | [addComment](/docs/operations/issue-comments.md#add-comment) |
| [IssueComments](/docs/operations/issue-comments.md) | [getComment](/docs/operations/issue-comments.md#get-comment) |
| [IssueComments](/docs/operations/issue-comments.md) | [updateComment](/docs/operations/issue-comments.md#update-comment) |

### Schema

| Group | Operation |
| --- | --- |
| [LinkIssueRequestJsonBean](/docs/schema/link-issue-request-json-bean.md) |
| [PageBeanComment](/docs/schema/page-bean-comment.md) |
| [PageOfComments](/docs/schema/page-of-comments.md) |
| [PaginatedResponseComment](/docs/schema/paginated-response-comment.md) |
