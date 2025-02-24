<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueLinks
{
    /**
     * Creates a link between two issues.
     * Use this operation to indicate a relationship between two issues and optionally add a comment to the from (outward) issue.
     * To use this resource the site must have "Issue Linking" enabled
     * 
     * This resource returns nothing on the creation of an issue link.
     * To obtain the ID of the issue link, use `https://your-domain.atlassian.net/rest/api/3/issue/[linked issue key]?fields=issuelinks`
     * 
     * If the link request duplicates a link, the response indicates that the issue link was created.
     * If the request included a comment, the comment is added
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse project* "project permission" for all the projects containing the issues to be linked,
     *  - *Link issues* "project permission" on the project containing the from (outward) issue,
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yoXKM
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function linkIssues(
        Schema\LinkIssueRequestJsonBean $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issueLink',
            method: 'post',
            body: $request,
            success: 201,
            schema: true,
        );
    }

    /**
     * Returns an issue link
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse project* "project permission" for all the projects containing the linked issues
     *  - If "issue-level security" is configured, permission to view both of the issues.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $linkId The ID of the issue link.
     */
    public function getIssueLink(
        string $linkId,
    ): Schema\IssueLink {
        return $this->call(
            uri: '/rest/api/3/issueLink/{linkId}',
            method: 'get',
            path: compact('linkId'),
            success: 200,
            schema: Schema\IssueLink::class,
        );
    }

    /**
     * Deletes an issue link
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - Browse project "project permission" for all the projects containing the issues in the link
     *  - *Link issues* "project permission" for at least one of the projects containing issues in the link
     *  - If "issue-level security" is configured, permission to view both of the issues.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $linkId The ID of the issue link.
     */
    public function deleteIssueLink(
        string $linkId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issueLink/{linkId}',
            method: 'delete',
            path: compact('linkId'),
            success: 200,
            schema: true,
        );
    }
}
