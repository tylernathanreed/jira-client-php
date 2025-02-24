<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueWatchers
{
    /**
     * Returns, for the user, details of the watched status of issues from a list.
     * If an issue ID is invalid, the returned watched status is `false`
     * 
     * This operation requires the **Allow users to watch issues** option to be *ON*.
     * This option is set in General configuration for Jira.
     * See "Configuring Jira application options" for details
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/uYXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function getIsWatchingIssueBulk(
        Schema\IssueList $request,
    ): Schema\BulkIssueIsWatching {
        return $this->call(
            uri: '/rest/api/3/issue/watching',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\BulkIssueIsWatching::class,
        );
    }

    /**
     * Returns the watchers for an issue
     * 
     * This operation requires the **Allow users to watch issues** option to be *ON*.
     * This option is set in General configuration for Jira.
     * See "Configuring Jira application options" for details
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is ini
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - To see details of users on the watchlist other than themselves, *View voters and watchers* "project permission" for the project that the issue is in.
     * 
     * @link https://confluence.atlassian.com/x/uYXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function getIssueWatchers(
        string $issueIdOrKey,
    ): Schema\Watchers {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/watchers',
            method: 'get',
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\Watchers::class,
        );
    }

    /**
     * Adds a user as a watcher of an issue by passing the account ID of the user.
     * For example, `"5b10ac8d82e05b22cc7d4ef5"`.
     * If no user is specified the calling user is added
     * 
     * This operation requires the **Allow users to watch issues** option to be *ON*.
     * This option is set in General configuration for Jira.
     * See "Configuring Jira application options" for details
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - To add users other than themselves to the watchlist, *Manage watcher list* "project permission" for the project that the issue is in.
     * 
     * @link https://confluence.atlassian.com/x/uYXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function addWatcher(
        string $issueIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/watchers',
            method: 'post',
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a user as a watcher of an issue
     * 
     * This operation requires the **Allow users to watch issues** option to be *ON*.
     * This option is set in General configuration for Jira.
     * See "Configuring Jira application options" for details
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - To remove users other than themselves from the watchlist, *Manage watcher list* "project permission" for the project that the issue is in.
     * 
     * @link https://confluence.atlassian.com/x/uYXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     *                          Required.
     */
    public function removeWatcher(
        string $issueIdOrKey,
        ?string $username = null,
        ?string $accountId = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/watchers',
            method: 'delete',
            query: compact('username', 'accountId'),
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }
}
