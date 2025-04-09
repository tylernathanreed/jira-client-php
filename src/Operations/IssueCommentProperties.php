<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueCommentProperties
{
    /**
     * Returns the keys of all the properties of a comment
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $commentId The ID of the comment.
     */
    public function getCommentPropertyKeys(
        string $commentId,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/comment/{commentId}/properties',
            method: 'get',
            path: compact('commentId'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the value of a comment property
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $commentId The ID of the comment.
     * @param string $propertyKey The key of the property.
     */
    public function getCommentProperty(
        string $commentId,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/comment/{commentId}/properties/{propertyKey}',
            method: 'get',
            path: compact('commentId', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Creates or updates the value of a property for a comment.
     * Use this resource to store custom data against a comment
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * **"Permissions" required:** either of:
     * 
     *  - *Edit All Comments* "project permission" to create or update the value of a property on any comment
     *  - *Edit Own Comments* "project permission" to create or update the value of a property on a comment created by the user
     * 
     * Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
     * 
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $commentId The ID of the comment.
     * @param string $propertyKey The key of the property.
     *                            The maximum length is 255 characters.
     */
    public function setCommentProperty(
        string $commentId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/comment/{commentId}/properties/{propertyKey}',
            method: 'put',
            path: compact('commentId', 'propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes a comment property
     * 
     * **"Permissions" required:** either of:
     * 
     *  - *Edit All Comments* "project permission" to delete a property from any comment
     *  - *Edit Own Comments* "project permission" to delete a property from a comment created by the user
     * 
     * Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $commentId The ID of the comment.
     * @param string $propertyKey The key of the property.
     */
    public function deleteCommentProperty(
        string $commentId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/comment/{commentId}/properties/{propertyKey}',
            method: 'delete',
            path: compact('commentId', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
