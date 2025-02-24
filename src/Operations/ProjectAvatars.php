<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectAvatars
{
    /**
     * Sets the avatar displayed for a project
     * 
     * Use "Load project avatar" to store avatars against the project, before using this operation to set the displayed avatar
     * 
     * **"Permissions" required:** *Administer projects* "project permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     */
    public function updateProjectAvatar(
        Schema\Avatar $request,
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/avatar',
            method: 'put',
            body: $request,
            path: compact('projectIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a custom avatar from a project.
     * Note that system avatars cannot be deleted
     * 
     * **"Permissions" required:** *Administer projects* "project permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or (case-sensitive) key.
     * @param int $id The ID of the avatar.
     */
    public function deleteProjectAvatar(
        string $projectIdOrKey,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/avatar/{id}',
            method: 'delete',
            path: compact('projectIdOrKey', 'id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Loads an avatar for a project
     * 
     * Specify the avatar's local file location in the body of the request.
     * Also, include the following headers:
     * 
     *  - `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see "Special Headers"
     *  - `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG
     * 
     * For example:  
     * `curl --request POST `
     * 
     * `--user email@example.com:<api_token> `
     * 
     * `--header 'X-Atlassian-Token: no-check' `
     * 
     * `--header 'Content-Type: image/< image_type>' `
     * 
     * `--data-binary "<@/path/to/file/with/your/avatar>" `
     * 
     * `--url 'https://your-domain.atlassian.net/rest/api/3/project/{projectIdOrKey}/avatar2'`
     * 
     * The avatar is cropped to a square.
     * If no crop parameters are specified, the square originates at the top left of the image.
     * The length of the square's sides is set to the smaller of the height or width of the image
     * 
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size
     * 
     * After creating the avatar use "Set project avatar" to set it as the project's displayed avatar
     * 
     * **"Permissions" required:** *Administer projects* "project permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     * @param int $x The X coordinate of the top-left corner of the crop region.
     * @param int $y The Y coordinate of the top-left corner of the crop region.
     * @param int $size The length of each side of the crop region.
     */
    public function createProjectAvatar(
        string $projectIdOrKey,
        ?int $x = 0,
        ?int $y = 0,
        ?int $size = 0,
    ): Schema\Avatar {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/avatar2',
            method: 'post',
            query: compact('x', 'y', 'size'),
            path: compact('projectIdOrKey'),
            success: 201,
            schema: Schema\Avatar::class,
        );
    }

    /**
     * Returns all project avatars, grouped by system and custom avatars
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     */
    public function getAllProjectAvatars(
        string $projectIdOrKey,
    ): Schema\ProjectAvatars {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/avatars',
            method: 'get',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\ProjectAvatars::class,
        );
    }
}
