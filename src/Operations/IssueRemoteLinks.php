<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueRemoteLinks
{
    /**
     * Returns the remote issue links for an issue.
     * When a remote issue link global ID is provided the record with that global ID is returned, otherwise all remote issue links are returned.
     * Where a global ID includes reserved URL characters these must be escaped in the request.
     * For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`
     * 
     * This operation requires "issue linking to be active"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $globalId The global ID of the remote issue link.
     */
    public function getRemoteIssueLinks(
        string $issueIdOrKey,
        ?string $globalId = null,
    ): Schema\RemoteIssueLink {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/remotelink',
            method: 'get',
            query: compact('globalId'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\RemoteIssueLink::class,
        );
    }

    /**
     * Creates or updates a remote issue link for an issue
     * 
     * If a `globalId` is provided and a remote issue link with that global ID is found it is updated.
     * Any fields without values in the request are set to null.
     * Otherwise, the remote issue link is created
     * 
     * This operation requires "issue linking to be active"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Link issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     */
    public function createOrUpdateRemoteIssueLink(
        Schema\RemoteIssueLinkRequest $request,
        string $issueIdOrKey,
    ): Schema\RemoteIssueLinkIdentifies {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/remotelink',
            method: 'post',
            body: $request,
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\RemoteIssueLinkIdentifies::class,
        );
    }

    /**
     * Deletes the remote issue link from the issue using the link's global ID.
     * Where the global ID includes reserved URL characters these must be escaped in the request.
     * For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`
     * 
     * This operation requires "issue linking to be active"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Link issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is implemented, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $globalId The global ID of a remote issue link.
     */
    public function deleteRemoteIssueLinkByGlobalId(
        string $issueIdOrKey,
        string $globalId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/remotelink',
            method: 'delete',
            query: compact('globalId'),
            path: compact('issueIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a remote issue link for an issue
     * 
     * This operation requires "issue linking to be active"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $linkId The ID of the remote issue link.
     */
    public function getRemoteIssueLinkById(
        string $issueIdOrKey,
        string $linkId,
    ): Schema\RemoteIssueLink {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}',
            method: 'get',
            path: compact('issueIdOrKey', 'linkId'),
            success: 200,
            schema: Schema\RemoteIssueLink::class,
        );
    }

    /**
     * Updates a remote issue link for an issue
     * 
     * Note: Fields without values in the request are set to null
     * 
     * This operation requires "issue linking to be active"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Link issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $linkId The ID of the remote issue link.
     */
    public function updateRemoteIssueLink(
        Schema\RemoteIssueLinkRequest $request,
        string $issueIdOrKey,
        string $linkId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}',
            method: 'put',
            body: $request,
            path: compact('issueIdOrKey', 'linkId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a remote issue link from an issue
     * 
     * This operation requires "issue linking to be active"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects*, *Edit issues*, and *Link issues* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $linkId The ID of a remote issue link.
     */
    public function deleteRemoteIssueLinkById(
        string $issueIdOrKey,
        string $linkId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}',
            method: 'delete',
            path: compact('issueIdOrKey', 'linkId'),
            success: 204,
            schema: true,
        );
    }
}
