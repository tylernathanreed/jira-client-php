<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Avatars
{
    /**
     * Returns a list of system avatar details by owner type, where the owner types are issue type, project, user or priority
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $type The avatar type.
     */
    public function getAllSystemAvatars(
        string $type,
    ): Schema\SystemAvatars {
        return $this->call(
            uri: '/rest/api/3/avatar/{type}/system',
            method: 'get',
            path: compact('type'),
            success: 200,
            schema: Schema\SystemAvatars::class,
        );
    }

    /**
     * Returns the system and custom avatars for a project, issue type or priority
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - for custom project avatars, *Browse projects* "project permission" for the project the avatar belongs to
     *  - for custom issue type avatars, *Browse projects* "project permission" for at least one project the issue type is used in
     *  - for system avatars, none
     *  - for priority avatars, none.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $type The avatar type.
     * @param string $entityId The ID of the item the avatar is associated with.
     */
    public function getAvatars(
        string $type,
        string $entityId,
    ): Schema\Avatars {
        return $this->call(
            uri: '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}',
            method: 'get',
            path: compact('type', 'entityId'),
            success: 200,
            schema: Schema\Avatars::class,
        );
    }

    /**
     * Loads a custom avatar for a project, issue type or priority
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
     * `--url 'https://your-domain.atlassian.net/rest/api/3/universal_avatar/type/{type}/owner/{entityId}'`
     * 
     * The avatar is cropped to a square.
     * If no crop parameters are specified, the square originates at the top left of the image.
     * The length of the square's sides is set to the smaller of the height or width of the image
     * 
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size
     * 
     * After creating the avatar use:
     * 
     *  - "Update issue type" to set it as the issue type's displayed avatar
     *  - "Set project avatar" to set it as the project's displayed avatar
     *  - "Update priority" to set it as the priority's displayed avatar
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $type The avatar type.
     * @param string $entityId The ID of the item the avatar is associated with.
     * @param int $x The X coordinate of the top-left corner of the crop region.
     * @param int $y The Y coordinate of the top-left corner of the crop region.
     * @param int $size The length of each side of the crop region.
     */
    public function storeAvatar(
        string $type,
        string $entityId,
        ?int $x = 0,
        ?int $y = 0,
        int $size = 0,
    ): Schema\Avatar {
        return $this->call(
            uri: '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}',
            method: 'post',
            query: compact('x', 'y', 'size'),
            path: compact('type', 'entityId'),
            success: 201,
            schema: Schema\Avatar::class,
        );
    }

    /**
     * Deletes an avatar from a project, issue type or priority
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $type The avatar type.
     * @param string $owningObjectId The ID of the item the avatar is associated with.
     * @param int $id The ID of the avatar.
     */
    public function deleteAvatar(
        string $type,
        string $owningObjectId,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/universal_avatar/type/{type}/owner/{owningObjectId}/avatar/{id}',
            method: 'delete',
            path: compact('type', 'owningObjectId', 'id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the default project, issue type or priority avatar image
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $type The icon type of the avatar.
     * @param string $size The size of the avatar image. If not provided the default size is returned.
     * @param string $format The format to return the avatar image in. If not provided the original content format is returned.
     */
    public function getAvatarImageByType(
        string $type,
        ?string $size = null,
        ?string $format = null,
    ): Schema\StreamingResponseBody {
        return $this->call(
            uri: '/rest/api/3/universal_avatar/view/type/{type}',
            method: 'get',
            query: compact('size', 'format'),
            path: compact('type'),
            success: 200,
            schema: Schema\StreamingResponseBody::class,
        );
    }

    /**
     * Returns a project, issue type or priority avatar image by ID
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - For system avatars, none
     *  - For custom project avatars, *Browse projects* "project permission" for the project the avatar belongs to
     *  - For custom issue type avatars, *Browse projects* "project permission" for at least one project the issue type is used in
     *  - For priority avatars, none.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $type The icon type of the avatar.
     * @param int $id The ID of the avatar.
     * @param string $size The size of the avatar image. If not provided the default size is returned.
     * @param string $format The format to return the avatar image in. If not provided the original content format is returned.
     */
    public function getAvatarImageByID(
        string $type,
        int $id,
        ?string $size = null,
        ?string $format = null,
    ): Schema\StreamingResponseBody {
        return $this->call(
            uri: '/rest/api/3/universal_avatar/view/type/{type}/avatar/{id}',
            method: 'get',
            query: compact('size', 'format'),
            path: compact('type', 'id'),
            success: 200,
            schema: Schema\StreamingResponseBody::class,
        );
    }

    /**
     * Returns the avatar image for a project, issue type or priority
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - For system avatars, none
     *  - For custom project avatars, *Browse projects* "project permission" for the project the avatar belongs to
     *  - For custom issue type avatars, *Browse projects* "project permission" for at least one project the issue type is used in
     *  - For priority avatars, none.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $type The icon type of the avatar.
     * @param string $entityId The ID of the project or issue type the avatar belongs to.
     * @param string $size The size of the avatar image. If not provided the default size is returned.
     * @param string $format The format to return the avatar image in. If not provided the original content format is returned.
     */
    public function getAvatarImageByOwner(
        string $type,
        string $entityId,
        ?string $size = null,
        ?string $format = null,
    ): Schema\StreamingResponseBody {
        return $this->call(
            uri: '/rest/api/3/universal_avatar/view/type/{type}/owner/{entityId}',
            method: 'get',
            query: compact('size', 'format'),
            path: compact('type', 'entityId'),
            success: 200,
            schema: Schema\StreamingResponseBody::class,
        );
    }
}
