<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait FilterSharing
{
    /**
     * Returns the default sharing settings for new filters and dashboards for a user
     * 
     * **"Permissions" required:** Permission to access Jira.
     */
    public function getDefaultShareScope(): Schema\DefaultShareScope
    {
        return $this->call(
            uri: '/rest/api/3/filter/defaultShareScope',
            method: 'get',
            success: 200,
            schema: Schema\DefaultShareScope::class,
        );
    }

    /**
     * Sets the default sharing for new filters and dashboards for a user
     * 
     * **"Permissions" required:** Permission to access Jira.
     */
    public function setDefaultShareScope(
        Schema\DefaultShareScope $request,
    ): Schema\DefaultShareScope {
        return $this->call(
            uri: '/rest/api/3/filter/defaultShareScope',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\DefaultShareScope::class,
        );
    }

    /**
     * Returns the share permissions for a filter.
     * A filter can be shared with groups, projects, all logged-in users, or the public.
     * Sharing with all logged-in users or the public is known as a global share permission
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None, however, share permissions are only returned for:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter.
     */
    public function getSharePermissions(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/permission',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Add a share permissions to a filter.
     * If you add a global share permission (one for all logged-in users or the public) it will overwrite all share permissions for the filter
     * 
     * Be aware that this operation uses different objects for updating share permissions compared to "Update filter"
     * 
     * **"Permissions" required:** *Share dashboards and filters* "global permission" and the user must own the filter.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the filter.
     */
    public function addSharePermission(
        Schema\SharePermissionInputBean $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/permission',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 201,
            schema: true,
        );
    }

    /**
     * Returns a share permission for a filter.
     * A filter can be shared with groups, projects, all logged-in users, or the public.
     * Sharing with all logged-in users or the public is known as a global share permission
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None, however, a share permission is only returned for:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter.
     * @param int $permissionId The ID of the share permission.
     */
    public function getSharePermission(
        int $id,
        int $permissionId,
    ): Schema\SharePermission {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/permission/{permissionId}',
            method: 'get',
            path: compact('id', 'permissionId'),
            success: 200,
            schema: Schema\SharePermission::class,
        );
    }

    /**
     * Deletes a share permission from a filter
     * 
     * **"Permissions" required:** Permission to access Jira and the user must own the filter.
     * 
     * @param int $id The ID of the filter.
     * @param int $permissionId The ID of the share permission.
     */
    public function deleteSharePermission(
        int $id,
        int $permissionId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/permission/{permissionId}',
            method: 'delete',
            path: compact('id', 'permissionId'),
            success: 204,
            schema: true,
        );
    }
}
