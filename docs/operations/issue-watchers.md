# Issue Watchers

Source: [`Jira\Client\Operations\IssueWatchers`](/src/Operations/IssueWatchers.php)

## Operations

- [Get Is Watching Issue Bulk](#getIsWatchingIssueBulk)
- [Get Issue Watchers](#getIssueWatchers)
- [Add Watcher](#addWatcher)
- [Delete Watcher](#removeWatcher)

## Get Is Watching Issue Bulk
<a name="getIsWatchingIssueBulk"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-watchers/#api-rest-api-3-issue-watching-post

Returns, for the user, details of the watched status of issues from a list.
If an issue ID is invalid, the returned watched status is `false`

This operation requires the **Allow users to watch issues** option to be *ON*.
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
use Jira\Client\Schema;

/** @var Schema\BulkIssueIsWatching $response */
$response = $client->getIsWatchingIssueBulk(new Schema\IssueList(
    issueIds: [
                '10001',
                '10002',
                '10005',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueList`](/docs/schema/issue-list.md)

A list of issue IDs.

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `list<string>` | The list of issue IDs. |

#### Response

Source: [`Jira\Client\Schema\BulkIssueIsWatching`](/docs/schema/bulk-issue-is-watching.md)

A container for the watch status of a list of issues.

| Property | Type | Description |
| --- | --- | --- |
| `issuesIsWatching` | `array<string,bool>` | The map of issue ID to boolean watch status. |


## Get Issue Watchers
<a name="getIssueWatchers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-watchers/#api-rest-api-3-issue-issue-id-or-key-watchers-get

Returns the watchers for an issue

This operation requires the **Allow users to watch issues** option to be *ON*.
This option is set in General configuration for Jira.
See "Configuring Jira application options" for details

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is ini
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - To see details of users on the watchlist other than themselves, *View voters and watchers* "project permission" for the project that the issue is in.
See: https://confluence.atlassian.com/x/uYXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\Watchers $response */
$response = $client->getIssueWatchers(
    issueIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

Source: [`Jira\Client\Schema\Watchers`](/docs/schema/watchers.md)

The details of watchers on an issue.

| Property | Type | Description |
| --- | --- | --- |
| `isWatching` | `bool` | Whether the calling user is watching this issue. |
| `self` | `string` | The URL of these issue watcher details. |
| `watchCount` | `int` | The number of users watching this issue. |
| `watchers` | [`?list<UserDetails>`](/docs/schema/user-details.md) | Details of the users watching this issue. |


## Add Watcher
<a name="addWatcher"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-watchers/#api-rest-api-3-issue-issue-id-or-key-watchers-post

Adds a user as a watcher of an issue by passing the account ID of the user.
For example, `"5b10ac8d82e05b22cc7d4ef5"`.
If no user is specified the calling user is added

This operation requires the **Allow users to watch issues** option to be *ON*.
This option is set in General configuration for Jira.
See "Configuring Jira application options" for details

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - To add users other than themselves to the watchlist, *Manage watcher list* "project permission" for the project that the issue is in.
See: https://confluence.atlassian.com/x/uYXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->addWatcher(
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
## Delete Watcher
<a name="removeWatcher"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-watchers/#api-rest-api-3-issue-issue-id-or-key-watchers-delete

Deletes a user as a watcher of an issue

This operation requires the **Allow users to watch issues** option to be *ON*.
This option is set in General configuration for Jira.
See "Configuring Jira application options" for details

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - To remove users other than themselves from the watchlist, *Manage watcher list* "project permission" for the project that the issue is in.
See: https://confluence.atlassian.com/x/uYXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->removeWatcher(
    issueIdOrKey: 'foo',
    username: null,
    accountId: '5b10ac8d82e05b22cc7d4ef5',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required. |

#### Response

`true`
