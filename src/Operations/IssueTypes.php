<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueTypes
{
    /**
     * Returns all issue types
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issue types are only returned as follows:
     * 
     *  - if the user has the *Administer Jira* "global permission", all issue types are returned
     *  - if the user has the *Browse projects* "project permission" for one or more projects, the issue types associated with the projects the user has permission to browse are returned.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @return list<Schema\IssueTypeDetails>
     */
    public function getIssueAllTypes(): array
    {
        return $this->call(
            uri: '/rest/api/3/issuetype',
            method: 'get',
            success: 200,
            schema: [Schema\IssueTypeDetails::class],
        );
    }

    /**
     * Creates an issue type and adds it to the default issue type scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createIssueType(
        Schema\IssueTypeCreateBean $request,
    ): Schema\IssueTypeDetails {
        return $this->call(
            uri: '/rest/api/3/issuetype',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\IssueTypeDetails::class,
        );
    }

    /**
     * Returns issue types for a project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" in the relevant project or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $projectId The ID of the project.
     * @param int $level The level of the issue type to filter by.
     *                   Use:
     *                    - `-1` for Subtask
     *                    - `0` for Base
     *                    - `1` for Epic.
     * 
     * @return list<Schema\IssueTypeDetails>
     */
    public function getIssueTypesForProject(
        int $projectId,
        ?int $level = null,
    ): array {
        return $this->call(
            uri: '/rest/api/3/issuetype/project',
            method: 'get',
            query: compact('projectId', 'level'),
            success: 200,
            schema: [Schema\IssueTypeDetails::class],
        );
    }

    /**
     * Returns an issue type
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" in a project the issue type is associated with or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue type.
     */
    public function getIssueType(
        string $id,
    ): Schema\IssueTypeDetails {
        return $this->call(
            uri: '/rest/api/3/issuetype/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\IssueTypeDetails::class,
        );
    }

    /**
     * Updates the issue type
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue type.
     */
    public function updateIssueType(
        Schema\IssueTypeUpdateBean $request,
        string $id,
    ): Schema\IssueTypeDetails {
        return $this->call(
            uri: '/rest/api/3/issuetype/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\IssueTypeDetails::class,
        );
    }

    /**
     * Deletes the issue type.
     * If the issue type is in use, all uses are updated with the alternative issue type (`alternativeIssueTypeId`).
     * A list of alternative issue types are obtained from the "Get alternative issue types" resource
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue type.
     * @param string $alternativeIssueTypeId The ID of the replacement issue type.
     */
    public function deleteIssueType(
        string $id,
        ?string $alternativeIssueTypeId = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuetype/{id}',
            method: 'delete',
            query: compact('alternativeIssueTypeId'),
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a list of issue types that can be used to replace the issue type.
     * The alternative issue types are those assigned to the same workflow scheme, field configuration scheme, and screen scheme
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $id The ID of the issue type.
     * 
     * @return list<Schema\IssueTypeDetails>
     */
    public function getAlternativeIssueTypes(
        string $id,
    ): array {
        return $this->call(
            uri: '/rest/api/3/issuetype/{id}/alternatives',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: [Schema\IssueTypeDetails::class],
        );
    }

    /**
     * Loads an avatar for the issue type
     * 
     * Specify the avatar's local file location in the body of the request.
     * Also, include the following headers:
     * 
     *  - `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see "Special Headers"
     *  - `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG
     * 
     * For example:  
     * `curl --request POST \ --user email@example.com:<api_token> \ --header 'X-Atlassian-Token: no-check' \ --header 'Content-Type: image/< image_type>' \ --data-binary "<@/path/to/file/with/your/avatar>" \ --url 'https://your-domain.atlassian.net/rest/api/3/issuetype/{issueTypeId}'This`
     * 
     * The avatar is cropped to a square.
     * If no crop parameters are specified, the square originates at the top left of the image.
     * The length of the square's sides is set to the smaller of the height or width of the image
     * 
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size
     * 
     * After creating the avatar, use " Update issue type" to set it as the issue type's displayed avatar
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue type.
     * @param int $size The length of each side of the crop region.
     * @param int $x The X coordinate of the top-left corner of the crop region.
     * @param int $y The Y coordinate of the top-left corner of the crop region.
     */
    public function createIssueTypeAvatar(
        string $id,
        int $size,
        ?int $x = 0,
        ?int $y = 0,
    ): Schema\Avatar {
        return $this->call(
            uri: '/rest/api/3/issuetype/{id}/avatar2',
            method: 'post',
            query: compact('size', 'x', 'y'),
            path: compact('id'),
            success: 201,
            schema: Schema\Avatar::class,
        );
    }
}
