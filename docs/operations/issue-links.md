# Issue Links

Source: [`Jira\Client\Operations\IssueLinks`](/src/Operations/IssueLinks.php)

## Operations

- [Create Issue Link](#linkIssues)
- [Get Issue Link](#getIssueLink)
- [Delete Issue Link](#deleteIssueLink)

## Create Issue Link
<a name="linkIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-links/#api-rest-api-3-issue-link-post

Creates a link between two issues.
Use this operation to indicate a relationship between two issues and optionally add a comment to the from (outward) issue.
To use this resource the site must have "Issue Linking" enabled

This resource returns nothing on the creation of an issue link.
To obtain the ID of the issue link, use `https://your-domain.atlassian.net/rest/api/3/issue/[linked issue key]?fields=issuelinks`

If the link request duplicates a link, the response indicates that the issue link was created.
If the request included a comment, the comment is added

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse project* "project permission" for all the projects containing the issues to be linked,
 - *Link issues* "project permission" on the project containing the from (outward) issue,
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\LinkIssueRequestJsonBean`](/docs/schema/link-issue-request-json-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `inwardIssue` | [`LinkedIssue`](/docs/schema/linked-issue.md) |  |
| `outwardIssue` | [`LinkedIssue`](/docs/schema/linked-issue.md) |  |
| `type` | [`IssueLinkType`](/docs/schema/issue-link-type.md) |  |
| `comment` | [`Comment`](/docs/schema/comment.md) |  |

#### Response

`true`
## Get Issue Link
<a name="getIssueLink"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-links/#api-rest-api-3-issue-link-link-id-get

Returns an issue link

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse project* "project permission" for all the projects containing the linked issues
 - If "issue-level security" is configured, permission to view both of the issues.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\IssueLink $response */
$response = $client->getIssueLink(
    linkId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `linkId` | `string` | The ID of the issue link. |

#### Response

Source: [`Jira\Client\Schema\IssueLink`](/docs/schema/issue-link.md)

Details of a link between issues.

| Property | Type | Description |
| --- | --- | --- |
| `inwardIssue` | [`LinkedIssue`](/docs/schema/linked-issue.md) | Provides details about the linked issue. If presenting this link in a user interface, use the `inward` field of the issue link type to label the link. |
| `outwardIssue` | [`LinkedIssue`](/docs/schema/linked-issue.md) | Provides details about the linked issue. If presenting this link in a user interface, use the `outward` field of the issue link type to label the link. |
| `type` | [`IssueLinkType`](/docs/schema/issue-link-type.md) | The type of link between the issues. |
| `id` | `string` | The ID of the issue link. |
| `self` | `string` | The URL of the issue link. |


## Delete Issue Link
<a name="deleteIssueLink"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-links/#api-rest-api-3-issue-link-link-id-delete

Deletes an issue link

This operation can be accessed anonymously

**"Permissions" required:**

 - Browse project "project permission" for all the projects containing the issues in the link
 - *Link issues* "project permission" for at least one of the projects containing issues in the link
 - If "issue-level security" is configured, permission to view both of the issues.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `linkId` | `string` | The ID of the issue link. |

#### Response

`true`
