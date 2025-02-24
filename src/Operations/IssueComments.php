<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueComments
{
    /**
     * Returns a "paginated" list of comments specified by a list of comment IDs
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Comments are returned where the user:
     * 
     *  - has *Browse projects* "project permission" for the project containing the comment
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $expand Use "expand" to include additional information about comments in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `renderedBody` Returns the comment body rendered in HTML
     *                        - `properties` Returns the comment's properties.
     */
    public function getCommentsByIds(
        Schema\IssueCommentListRequestBean $request,
        ?string $expand = null,
    ): Schema\PageBeanComment {
        return $this->call(
            uri: '/rest/api/3/comment/list',
            method: 'post',
            body: $request,
            query: compact('expand'),
            success: 200,
            schema: Schema\PageBeanComment::class,
        );
    }

    /**
     * Returns all comments for an issue
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Comments are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the comment
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the comment has visibility restrictions, belongs to the group or has the role visibility is role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param 'created'|'-created'|'+created'|null $orderBy
     *        "Order" the results by a field.
     *        Accepts *created* to sort comments by their created date.
     * @param string $expand Use "expand" to include additional information about comments in the response.
     *                       This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     */
    public function getComments(
        string $issueIdOrKey,
        ?int $startAt = 0,
        ?int $maxResults = 100,
        ?string $orderBy = null,
        ?string $expand = null,
    ): Schema\PageOfComments {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/comment',
            method: 'get',
            query: compact('startAt', 'maxResults', 'orderBy', 'expand'),
            path: compact('issueIdOrKey'),
            success: 200,
            schema: Schema\PageOfComments::class,
        );
    }

    /**
     * Adds a comment to an issue
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* and *Add comments* " project permission" for the project that the issue containing the comment is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $expand Use "expand" to include additional information about comments in the response.
     *                       This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     */
    public function addComment(
        Schema\Comment $request,
        string $issueIdOrKey,
        ?string $expand = null,
    ): Schema\Comment {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/comment',
            method: 'post',
            body: $request,
            query: compact('expand'),
            path: compact('issueIdOrKey'),
            success: 201,
            schema: Schema\Comment::class,
        );
    }

    /**
     * Returns a comment
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project containing the comment
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the comment.
     * @param string $expand Use "expand" to include additional information about comments in the response.
     *                       This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     */
    public function getComment(
        string $issueIdOrKey,
        string $id,
        ?string $expand = null,
    ): Schema\Comment {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/comment/{id}',
            method: 'get',
            query: compact('expand'),
            path: compact('issueIdOrKey', 'id'),
            success: 200,
            schema: Schema\Comment::class,
        );
    }

    /**
     * Updates a comment
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue containing the comment is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Edit all comments*" project permission" to update any comment or *Edit own comments* to update comment created by the user
     *  - If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the comment.
     * @param bool $notifyUsers Whether users are notified when a comment is updated.
     * @param bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited.
     *                                   Available to Connect app users with the *Administer Jira* "global permission" and Forge apps acting on behalf of users with *Administer Jira* "global permission".
     *                                   @link https://confluence.atlassian.com/x/x4dKLg
     * @param string $expand Use "expand" to include additional information about comments in the response.
     *                       This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     */
    public function updateComment(
        Schema\Comment $request,
        string $issueIdOrKey,
        string $id,
        ?bool $notifyUsers = true,
        ?bool $overrideEditableFlag = false,
        ?string $expand = null,
    ): Schema\Comment {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/comment/{id}',
            method: 'put',
            body: $request,
            query: compact('notifyUsers', 'overrideEditableFlag', 'expand'),
            path: compact('issueIdOrKey', 'id'),
            success: 200,
            schema: Schema\Comment::class,
        );
    }

    /**
     * Deletes a comment
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue containing the comment is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - *Delete all comments*" project permission" to delete any comment or *Delete own comments* to delete comment created by the user,
     *  - If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the comment.
     */
    public function deleteComment(
        string $issueIdOrKey,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/comment/{id}',
            method: 'delete',
            path: compact('issueIdOrKey', 'id'),
            success: 204,
            schema: true,
        );
    }
}
