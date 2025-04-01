# Issue Votes

Source: [`Jira\Client\Operations\IssueVotes`](/src/Operations/IssueVotes.php)

## Operations

- [Get Votes](#getVotes)
- [Add Vote](#addVote)
- [Delete Vote](#removeVote)

## Get Votes
<a name="getVotes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-votes/#api-rest-api-3-issue-issue-id-or-key-votes-get

Returns details about the votes on an issue

This operation requires the **Allow users to vote on issues** option to be *ON*.
This option is set in General configuration for Jira.
See "Configuring Jira application options" for details

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is ini
 - If "issue-level security" is configured, issue-level security permission to view the issue

Note that users with the necessary permissions for this operation but without the *View voters and watchers* project permissions are not returned details in the `voters` field.
See: https://confluence.atlassian.com/x/uYXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\Votes $response */
$response = $client->getVotes(
    issueIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

Source: [`Jira\Client\Schema\Votes`](/docs/schema/votes.md)

The details of votes on an issue.

| Property | Type | Description |
| --- | --- | --- |
| `hasVoted` | `bool` | Whether the user making this request has voted on the issue. |
| `self` | `string` | The URL of these issue vote details. |
| `voters` | [`?list<User>`](/docs/schema/user.md) | List of the users who have voted on this issue. An empty list is returned when the calling user doesn't have the *View voters and watchers* project permission. |
| `votes` | `int` | The number of votes on the issue. |


## Add Vote
<a name="addVote"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-votes/#api-rest-api-3-issue-issue-id-or-key-votes-post

Adds the user's vote to an issue.
This is the equivalent of the user clicking *Vote* on an issue in Jira

This operation requires the **Allow users to vote on issues** option to be *ON*.
This option is set in General configuration for Jira.
See "Configuring Jira application options" for details

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/uYXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->addVote(
    issueIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

`true`
## Delete Vote
<a name="removeVote"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-votes/#api-rest-api-3-issue-issue-id-or-key-votes-delete

Deletes a user's vote from an issue.
This is the equivalent of the user clicking *Unvote* on an issue in Jira

This operation requires the **Allow users to vote on issues** option to be *ON*.
This option is set in General configuration for Jira.
See "Configuring Jira application options" for details

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/uYXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->removeVote(
    issueIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

`true`
