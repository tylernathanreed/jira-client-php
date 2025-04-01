# Issue Comments

DummyDescription

Source: [`Jira\Client\Operations\IssueComments`](/src/Operations/IssueComments.php)

## Operations

- [Get Comments By IDs](#getCommentsByIds)
- [Get Comments](#getComments)
- [Add Comment](#addComment)
- [Get Comment](#getComment)
- [Update Comment](#updateComment)
- [Delete Comment](#deleteComment)

## Get Comments By IDs
<a name="getCommentsByIds"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comments/#api-rest-api-3-comment-list-post

Returns a "paginated" list of comments specified by a list of comment IDs

This operation can be accessed anonymously

**"Permissions" required:** Comments are returned where the user:

 - has *Browse projects* "project permission" for the project containing the comment
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PageBeanComment $response */
$response = $client->getCommentsByIds(
    request: new Schema\IssueCommentListRequestBean(
        ids: [
                '1',
                '2',
                '5',
                '10',
            ],
    )
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueCommentListRequestBean`](/docs/schema/issue-comment-list-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `list<int>` | The list of comment IDs. A maximum of 1000 IDs can be specified. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `renderedBody` Returns the comment body rendered in HTML.<br/> *  `properties` Returns the comment's properties. |

#### Response

Source: [`Jira\Client\Schema\PageBeanComment`](/docs/schema/page-bean-comment.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Comment>`](/docs/schema/comment.md) | The list of items. |


## Get Comments
<a name="getComments"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comments/#api-rest-api-3-issue-issue-id-or-key-comment-get

Returns all comments for an issue

This operation can be accessed anonymously

**"Permissions" required:** Comments are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the comment
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the comment has visibility restrictions, belongs to the group or has the role visibility is role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\PageOfComments $response */
$response = $client->getComments(
    issueIdOrKey: 'foo',
    startAt: 0,
    maxResults: 100,
    orderBy: null,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `orderBy` | `'created'\|'-created'\|'+created'\|null` | [Order](#ordering) the results by a field. Accepts *created* to sort comments by their created date. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML. |

#### Response

Source: [`Jira\Client\Schema\PageOfComments`](/docs/schema/page-of-comments.md)

A page of comments.

| Property | Type | Description |
| --- | --- | --- |
| `comments` | [`?list<Comment>`](/docs/schema/comment.md) | The list of comments. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |


## Add Comment
<a name="addComment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comments/#api-rest-api-3-issue-issue-id-or-key-comment-post

Adds a comment to an issue

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Add comments* " project permission" for the project that the issue containing the comment is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Comment $response */
$response = $client->addComment(
    request: new Schema\Comment(
        body: [
                'content' => [
                    0 => [
                        'content' => [
                            0 => [
                                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper.',
                                'type' => 'text',
                            ],
                        ],
                        'type' => 'paragraph',
                    ],
                ],
                'type' => 'doc',
                'version' => '1',
            ],
        visibility: [
                'identifier' => 'Administrators',
                'type' => 'role',
                'value' => 'Administrators',
            ],
    )
    issueIdOrKey: 'foo',
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Comment`](/docs/schema/comment.md)

A comment.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who created the comment. |
| `body` | `mixed` | The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). |
| `created` | `string` | The date and time at which the comment was created. |
| `id` | `string` | The ID of the comment. |
| `jsdAuthorCanSeeRequest` | `bool` | Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature. |
| `jsdPublic` | `bool` | Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | A list of comment properties. Optional on create and update. |
| `renderedBody` | `string` | The rendered version of the comment. |
| `self` | `string` | The URL of the comment. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who updated the comment last. |
| `updated` | `string` | The date and time at which the comment was updated last. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | The group or role to which this comment is visible. Optional on create and update. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML. |

#### Response

Source: [`Jira\Client\Schema\Comment`](/docs/schema/comment.md)

A comment.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who created the comment. |
| `body` | `mixed` | The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). |
| `created` | `string` | The date and time at which the comment was created. |
| `id` | `string` | The ID of the comment. |
| `jsdAuthorCanSeeRequest` | `bool` | Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature. |
| `jsdPublic` | `bool` | Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | A list of comment properties. Optional on create and update. |
| `renderedBody` | `string` | The rendered version of the comment. |
| `self` | `string` | The URL of the comment. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who updated the comment last. |
| `updated` | `string` | The date and time at which the comment was updated last. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | The group or role to which this comment is visible. Optional on create and update. |


## Get Comment
<a name="getComment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comments/#api-rest-api-3-issue-issue-id-or-key-comment-id-get

Returns a comment

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project containing the comment
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\Comment $response */
$response = $client->getComment(
    issueIdOrKey: 'foo',
    id: 'foo',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `id` | `string` | The ID of the comment. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML. |

#### Response

Source: [`Jira\Client\Schema\Comment`](/docs/schema/comment.md)

A comment.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who created the comment. |
| `body` | `mixed` | The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). |
| `created` | `string` | The date and time at which the comment was created. |
| `id` | `string` | The ID of the comment. |
| `jsdAuthorCanSeeRequest` | `bool` | Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature. |
| `jsdPublic` | `bool` | Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | A list of comment properties. Optional on create and update. |
| `renderedBody` | `string` | The rendered version of the comment. |
| `self` | `string` | The URL of the comment. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who updated the comment last. |
| `updated` | `string` | The date and time at which the comment was updated last. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | The group or role to which this comment is visible. Optional on create and update. |


## Update Comment
<a name="updateComment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comments/#api-rest-api-3-issue-issue-id-or-key-comment-id-put

Updates a comment

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue containing the comment is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Edit all comments*" project permission" to update any comment or *Edit own comments* to update comment created by the user
 - If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Comment $response */
$response = $client->updateComment(
    request: new Schema\Comment(
        body: [
                'content' => [
                    0 => [
                        'content' => [
                            0 => [
                                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper.',
                                'type' => 'text',
                            ],
                        ],
                        'type' => 'paragraph',
                    ],
                ],
                'type' => 'doc',
                'version' => '1',
            ],
        visibility: [
                'identifier' => 'Administrators',
                'type' => 'role',
                'value' => 'Administrators',
            ],
    )
    issueIdOrKey: 'foo',
    id: 'foo',
    notifyUsers: true,
    overrideEditableFlag: false,
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Comment`](/docs/schema/comment.md)

A comment.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who created the comment. |
| `body` | `mixed` | The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). |
| `created` | `string` | The date and time at which the comment was created. |
| `id` | `string` | The ID of the comment. |
| `jsdAuthorCanSeeRequest` | `bool` | Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature. |
| `jsdPublic` | `bool` | Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | A list of comment properties. Optional on create and update. |
| `renderedBody` | `string` | The rendered version of the comment. |
| `self` | `string` | The URL of the comment. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who updated the comment last. |
| `updated` | `string` | The date and time at which the comment was updated last. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | The group or role to which this comment is visible. Optional on create and update. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `id` | `string` | The ID of the comment. |
| `notifyUsers` | `?bool` | Whether users are notified when a comment is updated. |
| `overrideEditableFlag` | `?bool` | Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML. |

#### Response

Source: [`Jira\Client\Schema\Comment`](/docs/schema/comment.md)

A comment.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who created the comment. |
| `body` | `mixed` | The comment text in [Atlassian Document Format](https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/). |
| `created` | `string` | The date and time at which the comment was created. |
| `id` | `string` | The ID of the comment. |
| `jsdAuthorCanSeeRequest` | `bool` | Whether the comment was added from an email sent by a person who is not part of the issue. See [Allow external emails to be added as comments on issues](https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/)for information on setting up this feature. |
| `jsdPublic` | `bool` | Whether the comment is visible in Jira Service Desk. Defaults to true when comments are created in the Jira Cloud Platform. This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on. To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API [Create request comment](https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post) operation. |
| `properties` | [`?list<EntityProperty>`](/docs/schema/entity-property.md) | A list of comment properties. Optional on create and update. |
| `renderedBody` | `string` | The rendered version of the comment. |
| `self` | `string` | The URL of the comment. |
| `updateAuthor` | [`UserDetails`](/docs/schema/user-details.md) | The ID of the user who updated the comment last. |
| `updated` | `string` | The date and time at which the comment was updated last. |
| `visibility` | [`Visibility`](/docs/schema/visibility.md) | The group or role to which this comment is visible. Optional on create and update. |


## Delete Comment
<a name="deleteComment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-comments/#api-rest-api-3-issue-issue-id-or-key-comment-id-delete

Deletes a comment

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue containing the comment is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - *Delete all comments*" project permission" to delete any comment or *Delete own comments* to delete comment created by the user,
 - If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->deleteComment(
    issueIdOrKey: 'foo',
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `id` | `string` | The ID of the comment. |

#### Response

`true`
