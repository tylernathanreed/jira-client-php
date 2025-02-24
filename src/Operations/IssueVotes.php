<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueVotes
{
    /**
     * Returns details about the votes on an issue
     * 
     * This operation requires the **Allow users to vote on issues** option to be *ON*.
     * This option is set in General configuration for Jira.
     * See "Configuring Jira application options" for details
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is ini
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     * 
     * Note that users with the necessary permissions for this operation but without the *View voters and watchers* project permissions are not returned details in the `voters` field.
     * 
     * @link https://confluence.atlassian.com/x/uYXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function getVotes(
        string $issueIdOrKey,
    ): Schema\Votes {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/votes',
            method: 'get',
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\Votes::class,
        );
    }

    /**
     * Adds the user's vote to an issue.
     * This is the equivalent of the user clicking *Vote* on an issue in Jira
     * 
     * This operation requires the **Allow users to vote on issues** option to be *ON*.
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
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function addVote(
        string $issueIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/votes',
            method: 'post',
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a user's vote from an issue.
     * This is the equivalent of the user clicking *Unvote* on an issue in Jira
     * 
     * This operation requires the **Allow users to vote on issues** option to be *ON*.
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
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function removeVote(
        string $issueIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/votes',
            method: 'delete',
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }
}
